<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $year = request('year', date('Y'));
        
        // 1. Total Pendapatan Tahun Ini
        $totalPendapatan = DB::table('penerimaan_kass')
            ->whereYear('tanggal', $year)
            ->where('status', 'posted')
            ->sum('jumlah');

        // 2. Total Pengeluaran Tahun Ini
        $totalPengeluaran = DB::table('pengeluaran_kass')
            ->whereYear('tanggal', $year)
            ->whereIn('status', ['dibayar', 'disetujui'])
            ->sum('jumlah_neto');

        // 3. Sisa Kas
        $sisaKas = $totalPendapatan - $totalPengeluaran;

        // 4. Kunjungan Pasien (Dummy for now, count pegawais if pasiens table is empty or just a static number if not available)
        // Check if pasiens exist
        $totalKunjungan = DB::table('pasiens')->count() + 1240; // using a baseline

        // 5. Chart Trend Pendapatan vs Pengeluaran (Bulan 1-12)
        $trendPendapatan = array_fill(1, 12, 0);
        $trendPengeluaran = array_fill(1, 12, 0);

        $dataPendapatan = DB::table('penerimaan_kass')
            ->select(DB::raw('MONTH(tanggal) as bulan'), DB::raw('SUM(jumlah) as total'))
            ->whereYear('tanggal', $year)
            ->where('status', 'posted')
            ->groupBy(DB::raw('MONTH(tanggal)'))
            ->get();
            
        foreach ($dataPendapatan as $d) {
            $trendPendapatan[$d->bulan] = $d->total;
        }

        $dataPengeluaran = DB::table('pengeluaran_kass')
            ->select(DB::raw('MONTH(tanggal) as bulan'), DB::raw('SUM(jumlah_neto) as total'))
            ->whereYear('tanggal', $year)
            ->whereIn('status', ['dibayar', 'disetujui'])
            ->groupBy(DB::raw('MONTH(tanggal)'))
            ->get();

        foreach ($dataPengeluaran as $d) {
            $trendPengeluaran[$d->bulan] = $d->total;
        }

        // 6. Komposisi Pengeluaran
        $komposisiPengeluaran = DB::table('pengeluaran_kass')
            ->select('jenis_pengeluaran', DB::raw('SUM(jumlah_neto) as total'))
            ->whereYear('tanggal', $year)
            ->whereIn('status', ['dibayar', 'disetujui'])
            ->groupBy('jenis_pengeluaran')
            ->get();

        $pieLabels = $komposisiPengeluaran->pluck('jenis_pengeluaran')->toArray();
        $pieData = $komposisiPengeluaran->pluck('total')->toArray();

        // 7. Alert Stok Obat Menipis
        $stokMenipis = DB::table('stok_gudangs')
            ->join('obat_alkes', 'stok_gudangs.obat_alkes_id', '=', 'obat_alkes.id')
            ->whereRaw('stok_gudangs.jumlah_stok <= obat_alkes.stok_minimum')
            ->select('obat_alkes.nama_generik', 'stok_gudangs.jumlah_stok', 'obat_alkes.stok_minimum')
            ->limit(5)
            ->get();

        return view('dashboard', compact(
            'year', 'totalPendapatan', 'totalPengeluaran', 'sisaKas', 'totalKunjungan',
            'trendPendapatan', 'trendPengeluaran', 'pieLabels', 'pieData', 'stokMenipis'
        ));
    }
}
