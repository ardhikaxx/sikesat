@extends('layouts.app')
@section('title', 'Tambah Supplier - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-plus"></i> Tambah Supplier</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('supplier.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
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
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Data</button>
            </div>
        </form>
    </div>
</div>
@endsection