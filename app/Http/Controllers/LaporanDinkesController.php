<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\KunjunganPasien;
use App\Models\ObatAlkes;
use App\Models\StokGudang;
use App\Models\BillingPasien;

class LaporanDinkesController extends Controller
{
    public function index()
    {
        return view('laporan-dinkes.index');
    }

    public function generate(Request $request)
    {
        $request->validate([
            'jenis_laporan' => 'required',
            'bulan' => 'required|numeric|min:1|max:12',
            'tahun' => 'required|numeric',
        ]);

        $jenis = $request->jenis_laporan;
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $namaBulan = Carbon::create()->month($bulan)->translatedFormat('F');
        $title = "Laporan $jenis - $namaBulan $tahun";

        if ($jenis == 'LB1') {
            return $this->generateLB1($bulan, $tahun, $title);
        } elseif ($jenis == 'LB2') {
            return $this->generateLB2($bulan, $tahun, $title);
        } elseif ($jenis == 'LB3') {
            return $this->generateLB3($bulan, $tahun, $title);
        } elseif ($jenis == 'LB4') {
            return $this->generateLB4($bulan, $tahun, $title);
        }

        return back()->with('error', 'Jenis laporan tidak valid.');
    }

    private function generateLB1($bulan, $tahun, $title)
    {
        // Laporan Morbiditas (Data Kesakitan)
        // Simulasi data ICD-10 berdasarkan Billing Item karena belum ada tabel ICD khusus
        $data = DB::table('billing_items')
            ->join('billing_pasiens', 'billing_items.billing_id', '=', 'billing_pasiens.id')
            ->join('pasiens', 'billing_pasiens.pasien_id', '=', 'pasiens.id')
            ->whereMonth('billing_pasiens.tanggal', $bulan)
            ->whereYear('billing_pasiens.tanggal', $tahun)
            ->where('billing_items.jenis_item', 'Tindakan')
            ->select('billing_items.nama_item as penyakit', 
                     DB::raw('SUM(CASE WHEN pasiens.jenis_pasien = "BPJS" THEN 1 ELSE 0 END) as jumlah_bpjs'),
                     DB::raw('SUM(CASE WHEN pasiens.jenis_pasien = "Umum" THEN 1 ELSE 0 END) as jumlah_umum'),
                     DB::raw('COUNT(pasiens.id) as total_kasus')
            )
            ->groupBy('billing_items.nama_item')
            ->get();

        return view('laporan-dinkes.lb1', compact('data', 'title', 'bulan', 'tahun'));
    }

    private function generateLB2($bulan, $tahun, $title)
    {
        // LPLPO (Lembar Pemakaian dan Permintaan Obat)
        $data = ObatAlkes::all()->map(function($obat) use ($bulan, $tahun) {
            $stokAwal = StokGudang::where('obat_alkes_id', $obat->id)
                                  ->whereMonth('updated_at', '<', $bulan)
                                  ->whereYear('updated_at', '<=', $tahun)
                                  ->latest('updated_at')
                                  ->value('stok_tersedia') ?? 0;
            
            $penerimaan = DB::table('mutasi_stoks')
                            ->where('obat_alkes_id', $obat->id)
                            ->where('jenis', 'masuk')
                            ->whereMonth('tanggal', $bulan)
                            ->whereYear('tanggal', $tahun)
                            ->sum('jumlah');

            $pemakaian = DB::table('mutasi_stoks')
                            ->where('obat_alkes_id', $obat->id)
                            ->where('jenis', 'keluar')
                            ->whereMonth('tanggal', $bulan)
                            ->whereYear('tanggal', $tahun)
                            ->sum('jumlah');

            $sisa = ($stokAwal + $penerimaan) - $pemakaian;

            return (object) [
                'kode_barang' => $obat->kode_barang,
                'nama_generik' => $obat->nama_generik,
                'satuan' => $obat->satuan,
                'stok_awal' => $stokAwal,
                'penerimaan' => $penerimaan,
                'persediaan' => $stokAwal + $penerimaan,
                'pemakaian' => $pemakaian,
                'sisa_stok' => $sisa
            ];
        });

        return view('laporan-dinkes.lb2', compact('data', 'title', 'bulan', 'tahun'));
    }

    private function generateLB3($bulan, $tahun, $title)
    {
        // Laporan Gizi, KIA, KB, Imunisasi (Simulasi)
        $kegiatan = [
            'Ibu Hamil K1', 'Ibu Hamil K4', 'Persalinan oleh Tenaga Kesehatan',
            'Pelayanan Nifas', 'Kunjungan Bayi', 'Pelayanan KB Aktif',
            'Imunisasi BCG', 'Imunisasi DPT-HB-Hib', 'Imunisasi Polio', 'Imunisasi Campak'
        ];

        $data = [];
        foreach ($kegiatan as $k) {
            $data[] = (object) [
                'indikator' => $k,
                'target' => rand(50, 150),
                'pencapaian' => rand(30, 140),
            ];
        }

        return view('laporan-dinkes.lb3', compact('data', 'title', 'bulan', 'tahun'));
    }

    private function generateLB4($bulan, $tahun, $title)
    {
        // Laporan Kegiatan Puskesmas (Kunjungan)
        $data = KunjunganPasien::with('unit')
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->select('unit_id', 
                     DB::raw('SUM(jumlah_kunjungan_umum) as total_umum'),
                     DB::raw('SUM(jumlah_kunjungan_bpjs) as total_bpjs'),
                     DB::raw('SUM(jumlah_kunjungan_gratis) as total_gratis'),
                     DB::raw('SUM(total_kunjungan) as grand_total')
            )
            ->groupBy('unit_id')
            ->get();

        return view('laporan-dinkes.lb4', compact('data', 'title', 'bulan', 'tahun'));
    }
}
