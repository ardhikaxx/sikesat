@extends('layouts.app')
@section('title', 'Tambah RealisasiIndikatorMutu - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-plus"></i> Tambah RealisasiIndikatorMutu</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('realisasi-indikator-mutu.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('realisasi-indikator-mutu.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Indikator Id</label>
                <input type="text" name="indikator_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Unit Id</label>
                <input type="text" name="unit_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Periode Bulan</label>
                <input type="text" name="periode_bulan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Periode Tahun</label>
                <input type="text" name="periode_tahun" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nilai Realisasi</label>
                <input type="text" name="nilai_realisasi" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nilai Target</label>
                <input type="text" name="nilai_target" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Input Oleh</label>
                <input type="text" name="input_oleh" class="form-control" required>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Data</button>
            </div>
        </form>
    </div>
</div>
@endsection