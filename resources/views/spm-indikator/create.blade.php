@extends('layouts.app')
@section('title', 'Tambah SpmIndikator - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Tambah SpmIndikator</h1>
        <a href="{{ route('spm-indikator.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('spm-indikator.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Jenis Layanan</label>
                <input type="text" name="jenis_layanan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Indikator</label>
                <input type="text" name="indikator" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Standar Persentase</label>
                <input type="text" name="standar_persentase" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Is Aktif</label>
                <input type="text" name="is_aktif" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
        </form>
    </div>
</div>
@endsection