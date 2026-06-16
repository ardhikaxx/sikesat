@extends('layouts.app')
@section('title', 'Edit JaspelPerhitungan - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Edit JaspelPerhitungan</h1>
        <a href="{{ route('jaspel-perhitungan.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('jaspel-perhitungan.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Periode Bulan</label>
                <input type="text" name="periode_bulan" class="form-control" value="{{ $data->periode_bulan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Periode Tahun</label>
                <input type="text" name="periode_tahun" class="form-control" value="{{ $data->periode_tahun }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Sumber Dana</label>
                <input type="text" name="sumber_dana" class="form-control" value="{{ $data->sumber_dana }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Total Dana</label>
                <input type="text" name="total_dana" class="form-control" value="{{ $data->total_dana }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Status</label>
                <input type="text" name="status" class="form-control" value="{{ $data->status }}" required>
            </div>
            <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Update</button>
        </form>
    </div>
</div>
@endsection