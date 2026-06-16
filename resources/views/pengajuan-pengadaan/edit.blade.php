@extends('layouts.app')
@section('title', 'Edit PengajuanPengadaan - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Edit PengajuanPengadaan</h1>
        <a href="{{ route('pengajuan-pengadaan.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('pengajuan-pengadaan.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">No Pengajuan</label>
                <input type="text" name="no_pengajuan" class="form-control" value="{{ $data->no_pengajuan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Tanggal Pengajuan</label>
                <input type="text" name="tanggal_pengajuan" class="form-control" value="{{ $data->tanggal_pengajuan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Unit Id</label>
                <input type="text" name="unit_id" class="form-control" value="{{ $data->unit_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Rka Id</label>
                <input type="text" name="rka_id" class="form-control" value="{{ $data->rka_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jenis Pengadaan</label>
                <input type="text" name="jenis_pengadaan" class="form-control" value="{{ $data->jenis_pengadaan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Prioritas</label>
                <input type="text" name="prioritas" class="form-control" value="{{ $data->prioritas }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control" value="{{ $data->deskripsi }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Total Estimasi</label>
                <input type="text" name="total_estimasi" class="form-control" value="{{ $data->total_estimasi }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Status</label>
                <input type="text" name="status" class="form-control" value="{{ $data->status }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Diajukan Oleh</label>
                <input type="text" name="diajukan_oleh" class="form-control" value="{{ $data->diajukan_oleh }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Diverifikasi Oleh</label>
                <input type="text" name="diverifikasi_oleh" class="form-control" value="{{ $data->diverifikasi_oleh }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Diverifikasi At</label>
                <input type="text" name="diverifikasi_at" class="form-control" value="{{ $data->diverifikasi_at }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Disetujui Oleh</label>
                <input type="text" name="disetujui_oleh" class="form-control" value="{{ $data->disetujui_oleh }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Disetujui At</label>
                <input type="text" name="disetujui_at" class="form-control" value="{{ $data->disetujui_at }}" required>
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