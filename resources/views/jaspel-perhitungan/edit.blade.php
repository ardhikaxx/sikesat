@extends('layouts.app')
@section('title', 'Edit JaspelPerhitungan - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-edit"></i> Edit JaspelPerhitungan</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('jaspel-perhitungan.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('jaspel-perhitungan.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">Periode Bulan</label>
                <input type="text" name="periode_bulan" class="form-control" value="{{ $data->periode_bulan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Periode Tahun</label>
                <input type="text" name="periode_tahun" class="form-control" value="{{ $data->periode_tahun }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Sumber Dana</label>
                <input type="text" name="sumber_dana" class="form-control" value="{{ $data->sumber_dana }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Total Dana</label>
                <input type="text" name="total_dana" class="form-control" value="{{ $data->total_dana }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Status</label>
                <input type="text" name="status" class="form-control" value="{{ $data->status }}" required>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection