@extends('layouts.app')
@section('title', 'Tambah StokGudang - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Tambah StokGudang</h1>
        <a href="{{ route('stok-gudang.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('stok-gudang.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Obat Alkes Id</label>
                <input type="text" name="obat_alkes_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">No Batch</label>
                <input type="text" name="no_batch" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Tanggal Kedaluwarsa</label>
                <input type="text" name="tanggal_kedaluwarsa" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jumlah Masuk</label>
                <input type="text" name="jumlah_masuk" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jumlah Keluar</label>
                <input type="text" name="jumlah_keluar" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Stok Tersedia</label>
                <input type="text" name="stok_tersedia" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Harga Perolehan</label>
                <input type="text" name="harga_perolehan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Pengeluaran Id</label>
                <input type="text" name="pengeluaran_id" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
        </form>
    </div>
</div>
@endsection