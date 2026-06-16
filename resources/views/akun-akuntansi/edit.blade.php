@extends('layouts.app')
@section('title', 'Edit AkunAkuntansi - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-edit"></i> Edit AkunAkuntansi</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('akun-akuntansi.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('akun-akuntansi.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">Kode Akun</label>
                <input type="text" name="kode_akun" class="form-control" value="{{ $data->kode_akun }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Akun</label>
                <input type="text" name="nama_akun" class="form-control" value="{{ $data->nama_akun }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Jenis Akun</label>
                <input type="text" name="jenis_akun" class="form-control" value="{{ $data->jenis_akun }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Kelompok Akun</label>
                <input type="text" name="kelompok_akun" class="form-control" value="{{ $data->kelompok_akun }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Akun Induk Id</label>
                <input type="text" name="akun_induk_id" class="form-control" value="{{ $data->akun_induk_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Level</label>
                <input type="text" name="level" class="form-control" value="{{ $data->level }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Saldo Normal</label>
                <input type="text" name="saldo_normal" class="form-control" value="{{ $data->saldo_normal }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Is Aktif</label>
                <input type="text" name="is_aktif" class="form-control" value="{{ $data->is_aktif }}" required>
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