@extends('layouts.app')
@section('title', 'Tambah JaspelParameter - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-plus"></i> Tambah JaspelParameter</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('jaspel-parameter.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
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
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Data</button>
            </div>
        </form>
    </div>
</div>
@endsection