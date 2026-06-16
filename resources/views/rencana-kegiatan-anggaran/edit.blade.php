@extends('layouts.app')
@section('title', 'Edit RencanaKegiatanAnggaran - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-edit"></i> Edit RencanaKegiatanAnggaran</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('rencana-kegiatan-anggaran.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('rencana-kegiatan-anggaran.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">Tahun Anggaran Id</label>
                <input type="text" name="tahun_anggaran_id" class="form-control" value="{{ $data->tahun_anggaran_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Unit Id</label>
                <input type="text" name="unit_id" class="form-control" value="{{ $data->unit_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Sumber Dana Id</label>
                <input type="text" name="sumber_dana_id" class="form-control" value="{{ $data->sumber_dana_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Kode Kegiatan</label>
                <input type="text" name="kode_kegiatan" class="form-control" value="{{ $data->kode_kegiatan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Kegiatan</label>
                <input type="text" name="nama_kegiatan" class="form-control" value="{{ $data->nama_kegiatan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Tujuan</label>
                <input type="text" name="tujuan" class="form-control" value="{{ $data->tujuan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Sasaran</label>
                <input type="text" name="sasaran" class="form-control" value="{{ $data->sasaran }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Target Kuantitas</label>
                <input type="text" name="target_kuantitas" class="form-control" value="{{ $data->target_kuantitas }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Satuan Target</label>
                <input type="text" name="satuan_target" class="form-control" value="{{ $data->satuan_target }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Total Pagu</label>
                <input type="text" name="total_pagu" class="form-control" value="{{ $data->total_pagu }}" required>
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
                <label class="form-label fw-bold">Diajukan At</label>
                <input type="text" name="diajukan_at" class="form-control" value="{{ $data->diajukan_at }}" required>
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
                <label class="form-label fw-bold">Catatan Revisi</label>
                <input type="text" name="catatan_revisi" class="form-control" value="{{ $data->catatan_revisi }}" required>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection