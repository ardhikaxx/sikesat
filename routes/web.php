<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/pegawai', [App\Http\Controllers\PegawaiController::class, 'index'])->name('pegawai.index');
    Route::delete('/pegawai/{id}', [App\Http\Controllers\PegawaiController::class, 'destroy'])->name('pegawai.destroy');

    Route::get('/unit-pelayanan', [App\Http\Controllers\UnitPelayananController::class, 'index'])->name('unit-pelayanan.index');
    Route::get('/akun-akuntansi', [App\Http\Controllers\AkunAkuntansiController::class, 'index'])->name('akun-akuntansi.index');
    Route::get('/penerimaan', [App\Http\Controllers\PenerimaanKasController::class, 'index'])->name('penerimaan.index');
    Route::get('/pengeluaran', [App\Http\Controllers\PengeluaranKasController::class, 'index'])->name('pengeluaran.index');
    Route::get('/jurnal', [App\Http\Controllers\JurnalUmumController::class, 'index'])->name('jurnal.index');
    Route::get('/obat', [App\Http\Controllers\ObatAlkesController::class, 'index'])->name('obat.index');
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
    
    Route::get('/supplier', [App\Http\Controllers\SupplierController::class, 'index'])->name('supplier.index');
    Route::get('/aset', [App\Http\Controllers\AsetController::class, 'index'])->name('aset.index');
    Route::get('/rba', [App\Http\Controllers\RBAController::class, 'index'])->name('rba.index');
    Route::get('/mutu', [App\Http\Controllers\MutuController::class, 'index'])->name('mutu.index');
});
