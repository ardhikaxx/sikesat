@extends('layouts.app')
@section('title', 'Edit JaspelParameter - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-edit"></i> Edit JaspelParameter</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('jaspel-parameter.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('jaspel-parameter.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Parameter</label>
                <input type="text" name="nama_parameter" class="form-control" value="{{ $data->nama_parameter }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Bobot</label>
                <input type="text" name="bobot" class="form-control" value="{{ $data->bobot }}" required>
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