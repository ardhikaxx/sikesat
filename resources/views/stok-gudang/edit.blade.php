@extends('layouts.app')
@section('title', 'Edit StokGudang - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-edit"></i> Edit StokGudang</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('stok-gudang.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('stok-gudang.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">Obat Alkes Id</label>
                <input type="text" name="obat_alkes_id" class="form-control" value="{{ $data->obat_alkes_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">No Batch</label>
                <input type="text" name="no_batch" class="form-control" value="{{ $data->no_batch }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Tanggal Kedaluwarsa</label>
                <input type="text" name="tanggal_kedaluwarsa" class="form-control" value="{{ $data->tanggal_kedaluwarsa }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Jumlah Masuk</label>
                <input type="text" name="jumlah_masuk" class="form-control" value="{{ $data->jumlah_masuk }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Jumlah Keluar</label>
                <input type="text" name="jumlah_keluar" class="form-control" value="{{ $data->jumlah_keluar }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Stok Tersedia</label>
                <input type="text" name="stok_tersedia" class="form-control" value="{{ $data->stok_tersedia }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Harga Perolehan</label>
                <input type="text" name="harga_perolehan" class="form-control" value="{{ $data->harga_perolehan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Pengeluaran Id</label>
                <input type="text" name="pengeluaran_id" class="form-control" value="{{ $data->pengeluaran_id }}" required>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection