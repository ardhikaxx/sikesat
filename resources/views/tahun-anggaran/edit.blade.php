@extends('layouts.app')
@section('title', 'Edit TahunAnggaran - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Edit TahunAnggaran</h1>
        <a href="{{ route('tahun-anggaran.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('tahun-anggaran.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Tahun</label>
                <input type="text" name="tahun" class="form-control" value="{{ $data->tahun }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Status</label>
                <input type="text" name="status" class="form-control" value="{{ $data->status }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Tanggal Mulai</label>
                <input type="text" name="tanggal_mulai" class="form-control" value="{{ $data->tanggal_mulai }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Tanggal Selesai</label>
                <input type="text" name="tanggal_selesai" class="form-control" value="{{ $data->tanggal_selesai }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Catatan</label>
                <input type="text" name="catatan" class="form-control" value="{{ $data->catatan }}" required>
            </div>
            <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Update</button>
        </form>
    </div>
</div>
@endsection