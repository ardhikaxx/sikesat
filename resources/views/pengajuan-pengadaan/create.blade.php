@extends('layouts.app')
@section('title', 'Tambah PengajuanPengadaan - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-plus"></i> Tambah PengajuanPengadaan</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('pengajuan-pengadaan.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('pengajuan-pengadaan.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">No Pengajuan</label>
                <input type="text" name="no_pengajuan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Tanggal Pengajuan</label>
                <input type="text" name="tanggal_pengajuan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Unit Id</label>
                <input type="text" name="unit_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Rka Id</label>
                <input type="text" name="rka_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jenis Pengadaan</label>
                <input type="text" name="jenis_pengadaan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Prioritas</label>
                <input type="text" name="prioritas" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Total Estimasi</label>
                <input type="text" name="total_estimasi" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Status</label>
                <input type="text" name="status" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Diajukan Oleh</label>
                <input type="text" name="diajukan_oleh" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Diverifikasi Oleh</label>
                <input type="text" name="diverifikasi_oleh" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Diverifikasi At</label>
                <input type="text" name="diverifikasi_at" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Disetujui Oleh</label>
                <input type="text" name="disetujui_oleh" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Disetujui At</label>
                <input type="text" name="disetujui_at" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Catatan</label>
                <input type="text" name="catatan" class="form-control" required>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Data</button>
            </div>
        </form>
    </div>
</div>
@endsection