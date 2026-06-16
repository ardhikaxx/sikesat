@extends('layouts.app')
@section('title', 'Tambah AkunAkuntansi - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-plus"></i> Tambah AkunAkuntansi</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('akun-akuntansi.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('akun-akuntansi.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Kode Akun</label>
                <input type="text" name="kode_akun" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Akun</label>
                <input type="text" name="nama_akun" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jenis Akun</label>
                <input type="text" name="jenis_akun" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Kelompok Akun</label>
                <input type="text" name="kelompok_akun" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Akun Induk Id</label>
                <input type="text" name="akun_induk_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Level</label>
                <input type="text" name="level" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Saldo Normal</label>
                <input type="text" name="saldo_normal" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Is Aktif</label>
                <input type="text" name="is_aktif" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" required>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Data</button>
            </div>
        </form>
    </div>
</div>
@endsection