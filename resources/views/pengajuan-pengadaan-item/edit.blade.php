@extends('layouts.app')
@section('title', 'Edit PengajuanPengadaanItem - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-edit"></i> Edit PengajuanPengadaanItem</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('pengajuan-pengadaan-item.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('pengajuan-pengadaan-item.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">Pengajuan Id</label>
                <input type="text" name="pengajuan_id" class="form-control" value="{{ $data->pengajuan_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" value="{{ $data->nama_barang }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Spesifikasi</label>
                <input type="text" name="spesifikasi" class="form-control" value="{{ $data->spesifikasi }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Satuan</label>
                <input type="text" name="satuan" class="form-control" value="{{ $data->satuan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Jumlah</label>
                <input type="text" name="jumlah" class="form-control" value="{{ $data->jumlah }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Harga Estimasi</label>
                <input type="text" name="harga_estimasi" class="form-control" value="{{ $data->harga_estimasi }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Subtotal</label>
                <input type="text" name="subtotal" class="form-control" value="{{ $data->subtotal }}" required>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection