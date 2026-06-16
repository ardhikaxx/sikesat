@extends('layouts.app')
@section('title', 'Edit SpmIndikator - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-edit"></i> Edit SpmIndikator</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('spm-indikator.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('spm-indikator.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">Jenis Layanan</label>
                <input type="text" name="jenis_layanan" class="form-control" value="{{ $data->jenis_layanan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Indikator</label>
                <input type="text" name="indikator" class="form-control" value="{{ $data->indikator }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Standar Persentase</label>
                <input type="text" name="standar_persentase" class="form-control" value="{{ $data->standar_persentase }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Is Aktif</label>
                <input type="text" name="is_aktif" class="form-control" value="{{ $data->is_aktif }}" required>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection