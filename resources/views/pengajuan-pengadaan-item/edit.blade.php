@extends('layouts.app')
@section('title', 'Edit PengajuanPengadaanItem - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Edit PengajuanPengadaanItem</h1>
        <a href="{{ route('pengajuan-pengadaan-item.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('pengajuan-pengadaan-item.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Pengajuan Id</label>
                <input type="text" name="pengajuan_id" class="form-control" value="{{ $data->pengajuan_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" value="{{ $data->nama_barang }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Spesifikasi</label>
                <input type="text" name="spesifikasi" class="form-control" value="{{ $data->spesifikasi }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Satuan</label>
                <input type="text" name="satuan" class="form-control" value="{{ $data->satuan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jumlah</label>
                <input type="text" name="jumlah" class="form-control" value="{{ $data->jumlah }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Harga Estimasi</label>
                <input type="text" name="harga_estimasi" class="form-control" value="{{ $data->harga_estimasi }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Subtotal</label>
                <input type="text" name="subtotal" class="form-control" value="{{ $data->subtotal }}" required>
            </div>
            <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Update</button>
        </form>
    </div>
</div>
@endsection