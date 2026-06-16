@extends('layouts.app')
@section('title', 'Edit PengeluaranKasDetail - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Edit PengeluaranKasDetail</h1>
        <a href="{{ route('pengeluaran-kas-detail.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('pengeluaran-kas-detail.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Pengeluaran Id</label>
                <input type="text" name="pengeluaran_id" class="form-control" value="{{ $data->pengeluaran_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Akun Id</label>
                <input type="text" name="akun_id" class="form-control" value="{{ $data->akun_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Item</label>
                <input type="text" name="nama_item" class="form-control" value="{{ $data->nama_item }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Satuan</label>
                <input type="text" name="satuan" class="form-control" value="{{ $data->satuan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jumlah Qty</label>
                <input type="text" name="jumlah_qty" class="form-control" value="{{ $data->jumlah_qty }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Harga Satuan</label>
                <input type="text" name="harga_satuan" class="form-control" value="{{ $data->harga_satuan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Subtotal</label>
                <input type="text" name="subtotal" class="form-control" value="{{ $data->subtotal }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="{{ $data->keterangan }}" required>
            </div>
            <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Update</button>
        </form>
    </div>
</div>
@endsection