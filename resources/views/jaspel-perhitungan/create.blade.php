@extends('layouts.app')
@section('title', 'Tambah JaspelPerhitungan - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-plus"></i> Tambah JaspelPerhitungan</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('jaspel-perhitungan.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('jaspel-perhitungan.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Periode Bulan</label>
                <input type="text" name="periode_bulan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Periode Tahun</label>
                <input type="text" name="periode_tahun" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Sumber Dana</label>
                <select name="sumber_dana" class="form-control" required>
                    <option value="BPJS">BPJS</option>
                    <option value="Umum">Umum</option>
                    <option value="BOK">BOK</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Total Dana</label>
                <input type="text" name="total_dana" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Status</label>
                <select name="status" class="form-control" required>
                    <option value="draft">Draft</option>
                    <option value="verifikasi_ppk">Verifikasi PPK</option>
                    <option value="approved_kepala">Approved Kepala</option>
                    <option value="dicairkan">Dicairkan</option>
                </select>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Data</button>
            </div>
        </form>
    </div>
</div>
@endsection