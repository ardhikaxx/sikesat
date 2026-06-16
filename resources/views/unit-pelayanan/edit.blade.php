@extends('layouts.app')
@section('title', 'Edit UnitPelayanan - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Edit UnitPelayanan</h1>
        <a href="{{ route('unit-pelayanan.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('unit-pelayanan.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Kode</label>
                <input type="text" name="kode" class="form-control" value="{{ $data->kode }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $data->nama }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jenis</label>
                <input type="text" name="jenis" class="form-control" value="{{ $data->jenis }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Kepala Unit</label>
                <input type="text" name="kepala_unit" class="form-control" value="{{ $data->kepala_unit }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Is Aktif</label>
                <input type="text" name="is_aktif" class="form-control" value="{{ $data->is_aktif }}" required>
            </div>
            <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Update</button>
        </form>
    </div>
</div>
@endsection