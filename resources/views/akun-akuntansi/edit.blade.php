@extends('layouts.app')
@section('title', 'Edit AkunAkuntansi - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Edit AkunAkuntansi</h1>
        <a href="{{ route('akun-akuntansi.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('akun-akuntansi.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Kode Akun</label>
                <input type="text" name="kode_akun" class="form-control" value="{{ $data->kode_akun }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Akun</label>
                <input type="text" name="nama_akun" class="form-control" value="{{ $data->nama_akun }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jenis Akun</label>
                <input type="text" name="jenis_akun" class="form-control" value="{{ $data->jenis_akun }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Kelompok Akun</label>
                <input type="text" name="kelompok_akun" class="form-control" value="{{ $data->kelompok_akun }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Akun Induk Id</label>
                <input type="text" name="akun_induk_id" class="form-control" value="{{ $data->akun_induk_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Level</label>
                <input type="text" name="level" class="form-control" value="{{ $data->level }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Saldo Normal</label>
                <input type="text" name="saldo_normal" class="form-control" value="{{ $data->saldo_normal }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Is Aktif</label>
                <input type="text" name="is_aktif" class="form-control" value="{{ $data->is_aktif }}" required>
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