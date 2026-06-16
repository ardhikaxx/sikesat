@extends('layouts.app')
@section('title', 'Edit Pegawai - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-edit"></i> Edit Pegawai</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('pegawai.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">User Id</label>
                <input type="text" name="user_id" class="form-control" value="{{ $data->user_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Nip</label>
                <input type="text" name="nip" class="form-control" value="{{ $data->nip }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $data->nama }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Jenis Kelamin</label>
                <input type="text" name="jenis_kelamin" class="form-control" value="{{ $data->jenis_kelamin }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" value="{{ $data->tempat_lahir }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Tanggal Lahir</label>
                <input type="text" name="tanggal_lahir" class="form-control" value="{{ $data->tanggal_lahir }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ $data->alamat }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">No Telepon</label>
                <input type="text" name="no_telepon" class="form-control" value="{{ $data->no_telepon }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Jabatan</label>
                <input type="text" name="jabatan" class="form-control" value="{{ $data->jabatan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Golongan</label>
                <input type="text" name="golongan" class="form-control" value="{{ $data->golongan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Jenis Pegawai</label>
                <input type="text" name="jenis_pegawai" class="form-control" value="{{ $data->jenis_pegawai }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Unit Id</label>
                <input type="text" name="unit_id" class="form-control" value="{{ $data->unit_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Tanggal Masuk</label>
                <input type="text" name="tanggal_masuk" class="form-control" value="{{ $data->tanggal_masuk }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Status Aktif</label>
                <input type="text" name="status_aktif" class="form-control" value="{{ $data->status_aktif }}" required>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection