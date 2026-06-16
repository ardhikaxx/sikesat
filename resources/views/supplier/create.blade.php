@extends('layouts.app')
@section('title', 'Tambah Supplier - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Tambah Supplier</h1>
        <a href="{{ route('supplier.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('supplier.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Kode</label>
                <input type="text" name="kode" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jenis</label>
                <input type="text" name="jenis" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Alamat</label>
                <input type="text" name="alamat" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">No Telepon</label>
                <input type="text" name="no_telepon" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <input type="text" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">NPWP</label>
                <input type="text" name="NPWP" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Rekening</label>
                <input type="text" name="nama_rekening" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">No Rekening</label>
                <input type="text" name="no_rekening" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Bank</label>
                <input type="text" name="nama_bank" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Is Aktif</label>
                <input type="text" name="is_aktif" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
        </form>
    </div>
</div>
@endsection