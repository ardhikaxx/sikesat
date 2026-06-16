@extends('layouts.app')
@section('title', 'Tambah JaspelPerhitungan - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Tambah JaspelPerhitungan</h1>
        <a href="{{ route('jaspel-perhitungan.index') }}" class="text-decoration-none">&larr; Kembali</a>
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
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
        </form>
    </div>
</div>
@endsection