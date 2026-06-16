@extends('layouts.app')
@section('title', 'Tambah PenyusutanAset - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-plus"></i> Tambah PenyusutanAset</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('penyusutan-aset.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
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
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Data</button>
            </div>
        </form>
    </div>
</div>
@endsection