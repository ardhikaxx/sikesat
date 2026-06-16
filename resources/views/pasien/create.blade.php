@extends('layouts.app')
@section('title', 'Tambah Pasien - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Tambah Pasien</h1>
        <a href="{{ route('pasien.index') }}" class="text-decoration-none">&larr; Kembali</a>
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
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
        </form>
    </div>
</div>
@endsection