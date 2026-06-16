@extends('layouts.app')
@section('title', 'Tambah RencanaKegiatanAnggaran - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Tambah RencanaKegiatanAnggaran</h1>
        <a href="{{ route('rencana-kegiatan-anggaran.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('rencana-kegiatan-anggaran.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Tahun Anggaran Id</label>
                <input type="text" name="tahun_anggaran_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Unit Id</label>
                <input type="text" name="unit_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Sumber Dana Id</label>
                <input type="text" name="sumber_dana_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Kode Kegiatan</label>
                <input type="text" name="kode_kegiatan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Kegiatan</label>
                <input type="text" name="nama_kegiatan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Tujuan</label>
                <input type="text" name="tujuan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Sasaran</label>
                <input type="text" name="sasaran" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Target Kuantitas</label>
                <input type="text" name="target_kuantitas" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Satuan Target</label>
                <input type="text" name="satuan_target" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Total Pagu</label>
                <input type="text" name="total_pagu" class="form-control" required>
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
                <label class="form-label fw-semibold">Diajukan At</label>
                <input type="text" name="diajukan_at" class="form-control" required>
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
                <label class="form-label fw-semibold">Catatan Revisi</label>
                <input type="text" name="catatan_revisi" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
        </form>
    </div>
</div>
@endsection