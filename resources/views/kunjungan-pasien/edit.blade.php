@extends('layouts.app')
@section('title', 'Edit KunjunganPasien - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-edit"></i> Edit KunjunganPasien</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('kunjungan-pasien.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('kunjungan-pasien.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">Unit Id</label>
                <input type="text" name="unit_id" class="form-control" value="{{ $data->unit_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Tanggal</label>
                <input type="text" name="tanggal" class="form-control" value="{{ $data->tanggal }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Jumlah Kunjungan Umum</label>
                <input type="text" name="jumlah_kunjungan_umum" class="form-control" value="{{ $data->jumlah_kunjungan_umum }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Jumlah Kunjungan Bpjs</label>
                <input type="text" name="jumlah_kunjungan_bpjs" class="form-control" value="{{ $data->jumlah_kunjungan_bpjs }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Jumlah Kunjungan Gratis</label>
                <input type="text" name="jumlah_kunjungan_gratis" class="form-control" value="{{ $data->jumlah_kunjungan_gratis }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Total Kunjungan</label>
                <input type="text" name="total_kunjungan" class="form-control" value="{{ $data->total_kunjungan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Rata Waktu Tunggu</label>
                <input type="text" name="rata_waktu_tunggu" class="form-control" value="{{ $data->rata_waktu_tunggu }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Input Oleh</label>
                <input type="text" name="input_oleh" class="form-control" value="{{ $data->input_oleh }}" required>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection