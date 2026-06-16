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
    Route::resource('akun-akuntansi', App\Http\Controllers\AkunAkuntansiController::class);
    Route::resource('aset', App\Http\Controllers\AsetController::class);
    Route::resource('aset-kategori', App\Http\Controllers\AsetKategoriController::class);
    Route::resource('buku-besar', App\Http\Controllers\BukuBesarController::class);
    Route::resource('distribusi-detail', App\Http\Controllers\DistribusiDetailController::class);
    Route::resource('distribusi-ke-unit', App\Http\Controllers\DistribusiKeUnitController::class);
    Route::resource('indikator-mutu', App\Http\Controllers\IndikatorMutuController::class);
    Route::resource('jaspel-detail', App\Http\Controllers\JaspelDetailController::class);
    Route::resource('jaspel-parameter', App\Http\Controllers\JaspelParameterController::class);
    Route::resource('jaspel-perhitungan', App\Http\Controllers\JaspelPerhitunganController::class);
    Route::resource('jurnal-detail', App\Http\Controllers\JurnalDetailController::class);
    Route::resource('jurnal-penyesuaian', App\Http\Controllers\JurnalPenyesuaianController::class);
    Route::resource('jurnal-umum', App\Http\Controllers\JurnalUmumController::class);
    Route::resource('kapitasi-bpjs', App\Http\Controllers\KapitasiBpjsController::class);
    Route::resource('kunjungan-pasien', App\Http\Controllers\KunjunganPasienController::class);
    Route::resource('mutasi-stok', App\Http\Controllers\MutasiStokController::class);
    Route::resource('neraca-saldo', App\Http\Controllers\NeracaSaldoController::class);
    Route::resource('obat-alkes', App\Http\Controllers\ObatAlkesController::class);
    Route::resource('obat-alkes-kategori', App\Http\Controllers\ObatAlkesKategoriController::class);
    Route::resource('pasien', App\Http\Controllers\PasienController::class);
    Route::resource('pegawai', App\Http\Controllers\PegawaiController::class);
    Route::resource('pemeliharaan-aset', App\Http\Controllers\PemeliharaanAsetController::class);
    Route::resource('penerimaan-kas', App\Http\Controllers\PenerimaanKasController::class);
    Route::resource('penerimaan-kas-detail', App\Http\Controllers\PenerimaanKasDetailController::class);
    Route::resource('pengajuan-pengadaan', App\Http\Controllers\PengajuanPengadaanController::class);
    Route::resource('pengajuan-pengadaan-item', App\Http\Controllers\PengajuanPengadaanItemController::class);
    Route::resource('pengeluaran-kas', App\Http\Controllers\PengeluaranKasController::class);
    Route::resource('pengeluaran-kas-detail', App\Http\Controllers\PengeluaranKasDetailController::class);
    Route::post('penyusutan-aset/generate', [App\Http\Controllers\PenyusutanAsetController::class, 'generate'])->name('penyusutan-aset.generate');
    Route::resource('penyusutan-aset', App\Http\Controllers\PenyusutanAsetController::class);
    Route::resource('realisasi-indikator-mutu', App\Http\Controllers\RealisasiIndikatorMutuController::class);
    Route::resource('rencana-bisnis-anggaran', App\Http\Controllers\RencanaBisnisAnggaranController::class);
    Route::resource('rencana-kegiatan-anggaran', App\Http\Controllers\RencanaKegiatanAnggaranController::class);
    Route::resource('rka-rincian', App\Http\Controllers\RkaRincianController::class);
    Route::resource('spm-capaian', App\Http\Controllers\SpmCapaianController::class);
    Route::resource('spm-indikator', App\Http\Controllers\SpmIndikatorController::class);
    Route::resource('stok-gudang', App\Http\Controllers\StokGudangController::class);
    Route::resource('sumber-dana', App\Http\Controllers\SumberDanaController::class);
    Route::resource('supplier', App\Http\Controllers\SupplierController::class);
    Route::resource('survei-kepuasan', App\Http\Controllers\SurveiKepuasanController::class);
    Route::resource('tahun-anggaran', App\Http\Controllers\TahunAnggaranController::class);
    Route::resource('unit-pelayanan', App\Http\Controllers\UnitPelayananController::class);
    Route::resource('kontrak', App\Http\Controllers\KontrakPihakKetigaController::class);
});
