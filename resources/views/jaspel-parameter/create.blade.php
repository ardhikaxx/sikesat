@extends('layouts.app')
@section('title', 'Tambah JaspelParameter - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Tambah JaspelParameter</h1>
        <a href="{{ route('jaspel-parameter.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('jaspel-parameter.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Parameter</label>
                <input type="text" name="nama_parameter" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Bobot</label>
                <input type="text" name="bobot" class="form-control" required>
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