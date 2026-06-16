@extends('layouts.app')
@section('title', 'Tambah KunjunganPasien - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-plus"></i> Tambah KunjunganPasien</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('kunjungan-pasien.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('kunjungan-pasien.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Unit Id</label>
                <input type="text" name="unit_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Tanggal</label>
                <input type="text" name="tanggal" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jumlah Kunjungan Umum</label>
                <input type="text" name="jumlah_kunjungan_umum" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jumlah Kunjungan Bpjs</label>
                <input type="text" name="jumlah_kunjungan_bpjs" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jumlah Kunjungan Gratis</label>
                <input type="text" name="jumlah_kunjungan_gratis" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Total Kunjungan</label>
                <input type="text" name="total_kunjungan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Rata Waktu Tunggu</label>
                <input type="text" name="rata_waktu_tunggu" class="form-control" required>
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