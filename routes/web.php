<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanKeuanganController;
use App\Http\Controllers\UnitPelayananController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AkunAkuntansiController;
use App\Http\Controllers\SumberDanaController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PasienController;

Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Laporan Keuangan BLUD
    Route::get('/laporan-keuangan', [LaporanKeuanganController::class, 'index'])->name('laporan-keuangan.index');
    Route::get('/laporan-keuangan/generate', [LaporanKeuanganController::class, 'generate'])->name('laporan-keuangan.generate');

    // Master Data - Read All (Auth)
    Route::resource('unit-pelayanan', UnitPelayananController::class)->only(['index', 'show']);
    Route::resource('pegawai', PegawaiController::class)->only(['index', 'show']);
    Route::resource('akun-akuntansi', AkunAkuntansiController::class)->only(['index', 'show']);
    Route::resource('sumber-dana', SumberDanaController::class)->only(['index', 'show']);
    Route::resource('supplier', SupplierController::class)->only(['index', 'show']);
    Route::resource('pasien', PasienController::class)->only(['index', 'show']);

    // Master Data - CRUD (Super Admin)
    Route::middleware(['role:super_admin'])->group(function () {
        Route::resource('unit-pelayanan', UnitPelayananController::class)->except(['index', 'show']);
        Route::resource('pegawai', PegawaiController::class)->except(['index', 'show']);
        Route::resource('akun-akuntansi', AkunAkuntansiController::class)->except(['index', 'show']);
        Route::resource('sumber-dana', SumberDanaController::class)->except(['index', 'show']);
        Route::resource('supplier', SupplierController::class)->except(['index', 'show']);
        Route::resource('pasien', PasienController::class)->except(['index', 'show']);
    });

    Route::get('/penerimaan', [App\Http\Controllers\PenerimaanKasController::class, 'index'])->name('penerimaan.index');
    Route::get('/pengeluaran', [App\Http\Controllers\PengeluaranKasController::class, 'index'])->name('pengeluaran.index');
    Route::get('/jurnal', [App\Http\Controllers\JurnalUmumController::class, 'index'])->name('jurnal.index');
    Route::get('/obat', [App\Http\Controllers\ObatAlkesController::class, 'index'])->name('obat.index');
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
    Route::get('/user/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::get('/aset', [App\Http\Controllers\AsetController::class, 'index'])->name('aset.index');
    Route::get('/rba', [App\Http\Controllers\RBAController::class, 'index'])->name('rba.index');
    Route::get('/mutu', [App\Http\Controllers\MutuController::class, 'index'])->name('mutu.index');
});


// Auto-generated Routes
Route::middleware(['auth'])->group(function () {
    Route::resource('akun-akuntansi', App\Http\Controllers\AkunAkuntansiController::class)->only(['index', 'show']);
    Route::resource('aset', App\Http\Controllers\AsetController::class)->only(['index', 'show']);
    Route::resource('aset-kategori', App\Http\Controllers\AsetKategoriController::class)->only(['index', 'show']);
    Route::resource('buku-besar', App\Http\Controllers\BukuBesarController::class)->only(['index', 'show']);
    Route::resource('distribusi-detail', App\Http\Controllers\DistribusiDetailController::class)->only(['index', 'show']);
    Route::resource('distribusi-ke-unit', App\Http\Controllers\DistribusiKeUnitController::class)->only(['index', 'show']);
    Route::resource('indikator-mutu', App\Http\Controllers\IndikatorMutuController::class)->only(['index', 'show']);
    Route::resource('jaspel-detail', App\Http\Controllers\JaspelDetailController::class)->only(['index', 'show']);
    Route::resource('jaspel-parameter', App\Http\Controllers\JaspelParameterController::class)->only(['index', 'show']);
    Route::resource('jaspel-perhitungan', App\Http\Controllers\JaspelPerhitunganController::class)->only(['index', 'show']);
    Route::resource('jurnal-detail', App\Http\Controllers\JurnalDetailController::class)->only(['index', 'show']);
    Route::resource('jurnal-penyesuaian', App\Http\Controllers\JurnalPenyesuaianController::class)->only(['index', 'show']);
    Route::resource('jurnal-umum', App\Http\Controllers\JurnalUmumController::class)->only(['index', 'show']);
    Route::resource('kapitasi-bpjs', App\Http\Controllers\KapitasiBpjsController::class)->only(['index', 'show']);
    Route::resource('kunjungan-pasien', App\Http\Controllers\KunjunganPasienController::class)->only(['index', 'show']);
    Route::resource('mutasi-stok', App\Http\Controllers\MutasiStokController::class)->only(['index', 'show']);
    Route::resource('neraca-saldo', App\Http\Controllers\NeracaSaldoController::class)->only(['index', 'show']);
    Route::resource('obat-alkes', App\Http\Controllers\ObatAlkesController::class)->only(['index', 'show']);
    Route::resource('obat-alkes-kategori', App\Http\Controllers\ObatAlkesKategoriController::class)->only(['index', 'show']);
    Route::resource('pasien', App\Http\Controllers\PasienController::class)->only(['index', 'show']);
    Route::resource('pegawai', App\Http\Controllers\PegawaiController::class)->only(['index', 'show']);
    Route::resource('pemeliharaan-aset', App\Http\Controllers\PemeliharaanAsetController::class)->only(['index', 'show']);
    Route::resource('penerimaan-kas', App\Http\Controllers\PenerimaanKasController::class)->only(['index', 'show']);
    Route::resource('penerimaan-kas-detail', App\Http\Controllers\PenerimaanKasDetailController::class)->only(['index', 'show']);
    Route::resource('pengajuan-pengadaan', App\Http\Controllers\PengajuanPengadaanController::class)->only(['index', 'show']);
    Route::resource('pengajuan-pengadaan-item', App\Http\Controllers\PengajuanPengadaanItemController::class)->only(['index', 'show']);
    Route::resource('pengeluaran-kas', App\Http\Controllers\PengeluaranKasController::class)->only(['index', 'show']);
    Route::resource('pengeluaran-kas-detail', App\Http\Controllers\PengeluaranKasDetailController::class)->only(['index', 'show']);
    Route::resource('penyusutan-aset', App\Http\Controllers\PenyusutanAsetController::class)->only(['index', 'show']);
    Route::resource('realisasi-indikator-mutu', App\Http\Controllers\RealisasiIndikatorMutuController::class)->only(['index', 'show']);
    Route::resource('rencana-bisnis-anggaran', App\Http\Controllers\RencanaBisnisAnggaranController::class)->only(['index', 'show']);
    Route::resource('rencana-kegiatan-anggaran', App\Http\Controllers\RencanaKegiatanAnggaranController::class)->only(['index', 'show']);
    Route::resource('rka-rincian', App\Http\Controllers\RkaRincianController::class)->only(['index', 'show']);
    Route::resource('spm-capaian', App\Http\Controllers\SpmCapaianController::class)->only(['index', 'show']);
    Route::resource('spm-indikator', App\Http\Controllers\SpmIndikatorController::class)->only(['index', 'show']);
    Route::resource('stok-gudang', App\Http\Controllers\StokGudangController::class)->only(['index', 'show']);
    Route::resource('sumber-dana', App\Http\Controllers\SumberDanaController::class)->only(['index', 'show']);
    Route::resource('supplier', App\Http\Controllers\SupplierController::class)->only(['index', 'show']);
    Route::resource('survei-kepuasan', App\Http\Controllers\SurveiKepuasanController::class)->only(['index', 'show']);
    Route::resource('tahun-anggaran', App\Http\Controllers\TahunAnggaranController::class)->only(['index', 'show']);
    Route::resource('unit-pelayanan', App\Http\Controllers\UnitPelayananController::class)->only(['index', 'show']);

    // Restricted CRUD Operations
    Route::middleware(['auth'])->group(function () {
        Route::resource('akun-akuntansi', App\Http\Controllers\AkunAkuntansiController::class)->except(['index', 'show']);
        Route::resource('aset', App\Http\Controllers\AsetController::class)->except(['index', 'show']);
        Route::resource('aset-kategori', App\Http\Controllers\AsetKategoriController::class)->except(['index', 'show']);
        Route::resource('buku-besar', App\Http\Controllers\BukuBesarController::class)->except(['index', 'show']);
        Route::resource('distribusi-detail', App\Http\Controllers\DistribusiDetailController::class)->except(['index', 'show']);
        Route::resource('distribusi-ke-unit', App\Http\Controllers\DistribusiKeUnitController::class)->except(['index', 'show']);
        Route::resource('indikator-mutu', App\Http\Controllers\IndikatorMutuController::class)->except(['index', 'show']);
        Route::resource('jaspel-detail', App\Http\Controllers\JaspelDetailController::class)->except(['index', 'show']);
        Route::resource('jaspel-parameter', App\Http\Controllers\JaspelParameterController::class)->except(['index', 'show']);
        Route::resource('jaspel-perhitungan', App\Http\Controllers\JaspelPerhitunganController::class)->except(['index', 'show']);
        Route::resource('jurnal-detail', App\Http\Controllers\JurnalDetailController::class)->except(['index', 'show']);
        Route::resource('jurnal-penyesuaian', App\Http\Controllers\JurnalPenyesuaianController::class)->except(['index', 'show']);
        Route::resource('jurnal-umum', App\Http\Controllers\JurnalUmumController::class)->except(['index', 'show']);
        Route::resource('kapitasi-bpjs', App\Http\Controllers\KapitasiBpjsController::class)->except(['index', 'show']);
        Route::resource('kunjungan-pasien', App\Http\Controllers\KunjunganPasienController::class)->except(['index', 'show']);
        Route::resource('mutasi-stok', App\Http\Controllers\MutasiStokController::class)->except(['index', 'show']);
        Route::resource('neraca-saldo', App\Http\Controllers\NeracaSaldoController::class)->except(['index', 'show']);
        Route::resource('obat-alkes', App\Http\Controllers\ObatAlkesController::class)->except(['index', 'show']);
        Route::resource('obat-alkes-kategori', App\Http\Controllers\ObatAlkesKategoriController::class)->except(['index', 'show']);
        Route::resource('pasien', App\Http\Controllers\PasienController::class)->except(['index', 'show']);
        Route::resource('pegawai', App\Http\Controllers\PegawaiController::class)->except(['index', 'show']);
        Route::resource('pemeliharaan-aset', App\Http\Controllers\PemeliharaanAsetController::class)->except(['index', 'show']);
        Route::resource('penerimaan-kas', App\Http\Controllers\PenerimaanKasController::class)->except(['index', 'show']);
        Route::resource('penerimaan-kas-detail', App\Http\Controllers\PenerimaanKasDetailController::class)->except(['index', 'show']);
        Route::resource('pengajuan-pengadaan', App\Http\Controllers\PengajuanPengadaanController::class)->except(['index', 'show']);
        Route::resource('pengajuan-pengadaan-item', App\Http\Controllers\PengajuanPengadaanItemController::class)->except(['index', 'show']);
        Route::resource('pengeluaran-kas', App\Http\Controllers\PengeluaranKasController::class)->except(['index', 'show']);
        Route::resource('pengeluaran-kas-detail', App\Http\Controllers\PengeluaranKasDetailController::class)->except(['index', 'show']);
        Route::resource('penyusutan-aset', App\Http\Controllers\PenyusutanAsetController::class)->except(['index', 'show']);
        Route::resource('realisasi-indikator-mutu', App\Http\Controllers\RealisasiIndikatorMutuController::class)->except(['index', 'show']);
        Route::resource('rencana-bisnis-anggaran', App\Http\Controllers\RencanaBisnisAnggaranController::class)->except(['index', 'show']);
        Route::resource('rencana-kegiatan-anggaran', App\Http\Controllers\RencanaKegiatanAnggaranController::class)->except(['index', 'show']);
        Route::resource('rka-rincian', App\Http\Controllers\RkaRincianController::class)->except(['index', 'show']);
        Route::resource('spm-capaian', App\Http\Controllers\SpmCapaianController::class)->except(['index', 'show']);
        Route::resource('spm-indikator', App\Http\Controllers\SpmIndikatorController::class)->except(['index', 'show']);
        Route::resource('stok-gudang', App\Http\Controllers\StokGudangController::class)->except(['index', 'show']);
        Route::resource('sumber-dana', App\Http\Controllers\SumberDanaController::class)->except(['index', 'show']);
        Route::resource('supplier', App\Http\Controllers\SupplierController::class)->except(['index', 'show']);
        Route::resource('survei-kepuasan', App\Http\Controllers\SurveiKepuasanController::class)->except(['index', 'show']);
        Route::resource('tahun-anggaran', App\Http\Controllers\TahunAnggaranController::class)->except(['index', 'show']);
        Route::resource('unit-pelayanan', App\Http\Controllers\UnitPelayananController::class)->except(['index', 'show']);
    });
});
