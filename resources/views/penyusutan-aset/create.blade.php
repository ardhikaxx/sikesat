@extends('layouts.app')
@section('title', 'Tambah PenyusutanAset - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Tambah PenyusutanAset</h1>
        <a href="{{ route('penyusutan-aset.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('penyusutan-aset.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Aset Id</label>
                <input type="text" name="aset_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Periode Bulan</label>
                <input type="text" name="periode_bulan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Periode Tahun</label>
                <input type="text" name="periode_tahun" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nilai Penyusutan</label>
                <input type="text" name="nilai_penyusutan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Akumulasi Penyusutan</label>
                <input type="text" name="akumulasi_penyusutan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nilai Buku Sesudah</label>
                <input type="text" name="nilai_buku_sesudah" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jurnal Id</label>
                <input type="text" name="jurnal_id" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
        </form>
    </div>
</div>
@endsection