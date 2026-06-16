@extends('layouts.app')
@section('title', 'Tambah DistribusiDetail - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Tambah DistribusiDetail</h1>
        <a href="{{ route('distribusi-detail.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('distribusi-detail.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Distribusi Id</label>
                <input type="text" name="distribusi_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Obat Alkes Id</label>
                <input type="text" name="obat_alkes_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Stok Gudang Id</label>
                <input type="text" name="stok_gudang_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jumlah</label>
                <input type="text" name="jumlah" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Satuan</label>
                <input type="text" name="satuan" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
        </form>
    </div>
</div>
@endsection