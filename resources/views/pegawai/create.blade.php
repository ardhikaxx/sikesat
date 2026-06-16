@extends('layouts.app')
@section('title', 'Tambah Pegawai - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-plus"></i> Tambah Pegawai</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('pegawai.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">User Id</label>
                <input type="text" name="user_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nip</label>
                <input type="text" name="nip" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jenis Kelamin</label>
                <input type="text" name="jenis_kelamin" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Tanggal Lahir</label>
                <input type="text" name="tanggal_lahir" class="form-control" required>
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
                <label class="form-label fw-semibold">Jabatan</label>
                <input type="text" name="jabatan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Golongan</label>
                <input type="text" name="golongan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jenis Pegawai</label>
                <input type="text" name="jenis_pegawai" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Unit Id</label>
                <input type="text" name="unit_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" class="form-control">
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">No STR (Khusus Nakes)</label>
                    <input type="text" name="no_str" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Masa Berlaku STR</label>
                    <input type="date" name="tanggal_berakhir_str" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">No SIP (Khusus Nakes)</label>
                    <input type="text" name="no_sip" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Masa Berlaku SIP</label>
                    <input type="date" name="tanggal_berakhir_sip" class="form-control">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Status Aktif</label>
                <select name="status_aktif" class="form-control" required>
                    <option value="1">Aktif</option>
                    <option value="0">Nonaktif</option>
                </select>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Data</button>
            </div>
        </form>
    </div>
</div>
@endsection