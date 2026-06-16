@extends('layouts.app')
@section('title', 'Tambah PemeliharaanAset - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-plus"></i> Tambah PemeliharaanAset</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('pemeliharaan-aset.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('pemeliharaan-aset.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Aset Id</label>
                <input type="text" name="aset_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Tanggal</label>
                <input type="text" name="tanggal" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jenis Pemeliharaan</label>
                <input type="text" name="jenis_pemeliharaan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Biaya</label>
                <input type="text" name="biaya" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Pengeluaran Id</label>
                <input type="text" name="pengeluaran_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Kondisi Sebelum</label>
                <input type="text" name="kondisi_sebelum" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Kondisi Sesudah</label>
                <input type="text" name="kondisi_sesudah" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Dilakukan Oleh</label>
                <input type="text" name="dilakukan_oleh" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" required>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Data</button>
            </div>
        </form>
    </div>
</div>
@endsection