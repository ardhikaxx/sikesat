@extends('layouts.app')
@section('title', 'Tambah Pasien - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-plus"></i> Tambah Pasien</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('pasien.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('pasien.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">No Rm</label>
                <input type="text" name="no_rm" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nik</label>
                <input type="text" name="nik" class="form-control" required>
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
                <label class="form-label fw-semibold">Jenis Pasien</label>
                <input type="text" name="jenis_pasien" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">No Bpjs</label>
                <input type="text" name="no_bpjs" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Faskes Tingkat Satu</label>
                <input type="text" name="faskes_tingkat_satu" class="form-control" required>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Data</button>
            </div>
        </form>
    </div>
</div>
@endsection