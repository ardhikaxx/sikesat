@extends('layouts.app')
@section('title', 'Edit Pegawai - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Edit Pegawai</h1>
        <a href="{{ route('pegawai.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('pegawai.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">User Id</label>
                <input type="text" name="user_id" class="form-control" value="{{ $data->user_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nip</label>
                <input type="text" name="nip" class="form-control" value="{{ $data->nip }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $data->nama }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jenis Kelamin</label>
                <input type="text" name="jenis_kelamin" class="form-control" value="{{ $data->jenis_kelamin }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" value="{{ $data->tempat_lahir }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Tanggal Lahir</label>
                <input type="text" name="tanggal_lahir" class="form-control" value="{{ $data->tanggal_lahir }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ $data->alamat }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">No Telepon</label>
                <input type="text" name="no_telepon" class="form-control" value="{{ $data->no_telepon }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jabatan</label>
                <input type="text" name="jabatan" class="form-control" value="{{ $data->jabatan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Golongan</label>
                <input type="text" name="golongan" class="form-control" value="{{ $data->golongan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jenis Pegawai</label>
                <input type="text" name="jenis_pegawai" class="form-control" value="{{ $data->jenis_pegawai }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Unit Id</label>
                <input type="text" name="unit_id" class="form-control" value="{{ $data->unit_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Tanggal Masuk</label>
                <input type="text" name="tanggal_masuk" class="form-control" value="{{ $data->tanggal_masuk }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Status Aktif</label>
                <input type="text" name="status_aktif" class="form-control" value="{{ $data->status_aktif }}" required>
            </div>
            <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Update</button>
        </form>
    </div>
</div>
@endsection