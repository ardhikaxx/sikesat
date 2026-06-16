@extends('layouts.app')
@section('title', 'Edit Pasien - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-edit"></i> Edit Pasien</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('pasien.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('pasien.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">No Rm</label>
                <input type="text" name="no_rm" class="form-control" value="{{ $data->no_rm }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Nik</label>
                <input type="text" name="nik" class="form-control" value="{{ $data->nik }}" required>
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
                <label class="form-label fw-bold">Jenis Pasien</label>
                <input type="text" name="jenis_pasien" class="form-control" value="{{ $data->jenis_pasien }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">No Bpjs</label>
                <input type="text" name="no_bpjs" class="form-control" value="{{ $data->no_bpjs }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Faskes Tingkat Satu</label>
                <input type="text" name="faskes_tingkat_satu" class="form-control" value="{{ $data->faskes_tingkat_satu }}" required>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection