@extends('layouts.app')
@section('title', 'Edit PengajuanPengadaan - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-edit"></i> Edit PengajuanPengadaan</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('pengajuan-pengadaan.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('pengajuan-pengadaan.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">No Pengajuan</label>
                <input type="text" name="no_pengajuan" class="form-control" value="{{ $data->no_pengajuan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Tanggal Pengajuan</label>
                <input type="text" name="tanggal_pengajuan" class="form-control" value="{{ $data->tanggal_pengajuan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Unit Id</label>
                <input type="text" name="unit_id" class="form-control" value="{{ $data->unit_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Rka Id</label>
                <input type="text" name="rka_id" class="form-control" value="{{ $data->rka_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Jenis Pengadaan</label>
                <input type="text" name="jenis_pengadaan" class="form-control" value="{{ $data->jenis_pengadaan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Prioritas</label>
                <input type="text" name="prioritas" class="form-control" value="{{ $data->prioritas }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control" value="{{ $data->deskripsi }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Total Estimasi</label>
                <input type="text" name="total_estimasi" class="form-control" value="{{ $data->total_estimasi }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Status</label>
                <input type="text" name="status" class="form-control" value="{{ $data->status }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Diajukan Oleh</label>
                <input type="text" name="diajukan_oleh" class="form-control" value="{{ $data->diajukan_oleh }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Diverifikasi Oleh</label>
                <input type="text" name="diverifikasi_oleh" class="form-control" value="{{ $data->diverifikasi_oleh }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Diverifikasi At</label>
                <input type="text" name="diverifikasi_at" class="form-control" value="{{ $data->diverifikasi_at }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Disetujui Oleh</label>
                <input type="text" name="disetujui_oleh" class="form-control" value="{{ $data->disetujui_oleh }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Disetujui At</label>
                <input type="text" name="disetujui_at" class="form-control" value="{{ $data->disetujui_at }}" required>
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