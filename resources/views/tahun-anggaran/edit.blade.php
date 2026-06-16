@extends('layouts.app')
@section('title', 'Edit TahunAnggaran - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-edit"></i> Edit TahunAnggaran</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('tahun-anggaran.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('tahun-anggaran.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">Tahun</label>
                <input type="text" name="tahun" class="form-control" value="{{ $data->tahun }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Status</label>
                <input type="text" name="status" class="form-control" value="{{ $data->status }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Tanggal Mulai</label>
                <input type="text" name="tanggal_mulai" class="form-control" value="{{ $data->tanggal_mulai }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Tanggal Selesai</label>
                <input type="text" name="tanggal_selesai" class="form-control" value="{{ $data->tanggal_selesai }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Catatan</label>
                <input type="text" name="catatan" class="form-control" value="{{ $data->catatan }}" required>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection