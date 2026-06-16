@extends('layouts.app')
@section('title', 'Edit PengeluaranKasDetail - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-edit"></i> Edit PengeluaranKasDetail</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('pengeluaran-kas-detail.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('pengeluaran-kas-detail.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">Pengeluaran Id</label>
                <input type="text" name="pengeluaran_id" class="form-control" value="{{ $data->pengeluaran_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Akun Id</label>
                <input type="text" name="akun_id" class="form-control" value="{{ $data->akun_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Item</label>
                <input type="text" name="nama_item" class="form-control" value="{{ $data->nama_item }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Satuan</label>
                <input type="text" name="satuan" class="form-control" value="{{ $data->satuan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Jumlah Qty</label>
                <input type="text" name="jumlah_qty" class="form-control" value="{{ $data->jumlah_qty }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Harga Satuan</label>
                <input type="text" name="harga_satuan" class="form-control" value="{{ $data->harga_satuan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Subtotal</label>
                <input type="text" name="subtotal" class="form-control" value="{{ $data->subtotal }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="{{ $data->keterangan }}" required>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection