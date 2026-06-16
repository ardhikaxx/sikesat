@extends('layouts.app')
@section('title', 'Edit DistribusiDetail - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-edit"></i> Edit DistribusiDetail</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('distribusi-detail.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('distribusi-detail.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">Distribusi Id</label>
                <input type="text" name="distribusi_id" class="form-control" value="{{ $data->distribusi_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Obat Alkes Id</label>
                <input type="text" name="obat_alkes_id" class="form-control" value="{{ $data->obat_alkes_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Stok Gudang Id</label>
                <input type="text" name="stok_gudang_id" class="form-control" value="{{ $data->stok_gudang_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Jumlah</label>
                <input type="text" name="jumlah" class="form-control" value="{{ $data->jumlah }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Satuan</label>
                <input type="text" name="satuan" class="form-control" value="{{ $data->satuan }}" required>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection