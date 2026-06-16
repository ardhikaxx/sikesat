<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use App\Exports\LaporanKeuanganExport; // We'll create this class later

class LaporanKeuanganController extends Controller
{
    public function index()
    {
        $years = DB::table('tahun_anggarans')->orderBy('tahun', 'desc')->pluck('tahun');
        return view('laporan-keuangan.index', compact('years'));
    }

    public function generate(Request $request)
    {
        $jenis = $request->input('jenis_laporan');
        $tahun = $request->input('tahun', date('Y'));
        $format = $request->input('format', 'html'); // html, pdf, excel

        $data = [];
        $viewName = 'laporan-keuangan.' . strtolower($jenis);
        $title = '';

        switch ($jenis) {
            case 'LRA':
                $title = 'Laporan Realisasi Anggaran (LRA)';
                $data = $this->getLRAData($tahun);
                break;
            case 'LO':
                $title = 'Laporan Operasional (LO)';
                $data = $this->getLOData($tahun);
                break;
            case 'NERACA':
                $title = 'Neraca';
                $data = $this->getNeracaData($tahun);
                break;
            case 'LAK':
                $title = 'Laporan Arus Kas (LAK)';
                $data = $this->getLAKData($tahun);
                break;
        }

        if ($format === 'pdf') {
            $pdf = Pdf::loadView($viewName, compact('data', 'tahun', 'title', 'format'))->setPaper('a4', 'portrait');
            return $pdf->download("{$jenis}_{$tahun}.pdf");
        } elseif ($format === 'excel') {
            // Nanti di-handle oleh Export class
            return Excel::download(new LaporanKeuanganExport($viewName, $data, $tahun, $title), "{$jenis}_{$tahun}.xlsx");
        }

        return view($viewName, compact('data', 'tahun', 'title', 'format'));
    }

    private function getLRAData($tahun)
    {
        // Pendapatan LRA vs Realisasi (dari Penerimaan Kas)
        $pendapatan = DB::table('akun_akuntansis as a')
            ->leftJoin('rencana_bisnis_anggarans as rba', function($join) use ($tahun) {
                $join->on('a.id', '=', 'rba.akun_id')
                     ->join('tahun_anggarans as t', 'rba.tahun_anggaran_id', '=', 't.id')
                     ->where('t.tahun', $tahun);
            })
            ->leftJoin('penerimaan_kass as p', function($join) use ($tahun) {
                $join->on('rba.sumber_dana_id', '=', 'p.sumber_dana_id')
                     ->whereYear('p.tanggal', $tahun)
                     ->where('p.status', 'posted');
            })
            ->where('a.kelompok_akun', 'pendapatan_lra')
            ->select('a.kode_akun', 'a.nama_akun', 
                DB::raw('COALESCE(SUM(rba.total_target), 0) as anggaran'),
                DB::raw('COALESCE(SUM(p.jumlah), 0) as realisasi')
            )
            ->groupBy('a.kode_akun', 'a.nama_akun')
            ->get();

        // Belanja vs Realisasi (dari Pengeluaran Kas)
        $belanja = DB::table('akun_akuntansis as a')
            ->leftJoin('rencana_bisnis_anggarans as rba', function($join) use ($tahun) {
                $join->on('a.id', '=', 'rba.akun_id')
                     ->join('tahun_anggarans as t', 'rba.tahun_anggaran_id', '=', 't.id')
                     ->where('t.tahun', $tahun);
            })
            ->leftJoin('pengeluaran_kass as pk', function($join) use ($tahun) {
                $join->on('rba.sumber_dana_id', '=', 'pk.sumber_dana_id') // Simplification
                     ->whereYear('pk.tanggal', $tahun)
                     ->whereIn('pk.status', ['disetujui', 'dibayar']);
            })
            ->where('a.jenis_akun', 'beban') // Di LRA BLUD, Beban/Belanja
            ->select('a.kode_akun', 'a.nama_akun', 
                DB::raw('COALESCE(SUM(rba.total_target), 0) as anggaran'),
                DB::raw('COALESCE(SUM(pk.jumlah_neto), 0) as realisasi')
            )
            ->groupBy('a.kode_akun', 'a.nama_akun')
            ->get();

        return compact('pendapatan', 'belanja');
    }

    private function getLOData($tahun)
    {
        // Pendapatan LO
        $pendapatan_lo = DB::table('akun_akuntansis')
            ->where('kelompok_akun', 'pendapatan_lra') // Asumsi LO dan LRA mirip untuk BLUD kecil
            ->get();

        // Beban
        $beban = DB::table('akun_akuntansis')
            ->where('jenis_akun', 'beban')
            ->get();
            
        // Nilai realisasi dari jurnal umum
        $jurnal = DB::table('jurnal_umums')
            ->whereYear('tanggal', $tahun)
            ->where('status', 'posted')
            ->sum('total_debit'); // Dummy total for now to show format

        return compact('pendapatan_lo', 'beban', 'jurnal');
    }

    private function getNeracaData($tahun)
    {
        $aset = DB::table('akun_akuntansis')->where('jenis_akun', 'aset')->get();
        $kewajiban = DB::table('akun_akuntansis')->where('jenis_akun', 'kewajiban')->get();
        $ekuitas = DB::table('akun_akuntansis')->where('jenis_akun', 'ekuitas')->get();

        return compact('aset', 'kewajiban', 'ekuitas');
    }

    private function getLAKData($tahun)
    {
        $arus_masuk = DB::table('penerimaan_kass')->whereYear('tanggal', $tahun)->where('status', 'posted')->sum('jumlah');
        $arus_keluar = DB::table('pengeluaran_kass')->whereYear('tanggal', $tahun)->whereIn('status', ['dibayar', 'disetujui'])->sum('jumlah_neto');

        return compact('arus_masuk', 'arus_keluar');
    }
}
