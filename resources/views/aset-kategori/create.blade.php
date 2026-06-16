@extends('layouts.app')
@section('title', 'Tambah AsetKategori - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-plus"></i> Tambah AsetKategori</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('aset-kategori.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('aset-kategori.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Kode</label>
                <input type="text" name="kode" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jenis</label>
                <input type="text" name="jenis" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Masa Manfaat Tahun</label>
                <input type="text" name="masa_manfaat_tahun" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Tarif Penyusutan</label>
                <input type="text" name="tarif_penyusutan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Akun Perolehan Id</label>
                <input type="text" name="akun_perolehan_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Akun Penyusutan Id</label>
                <input type="text" name="akun_penyusutan_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Akun Akumulasi Id</label>
                <input type="text" name="akun_akumulasi_id" class="form-control" required>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Data</button>
            </div>
        </form>
    </div>
</div>
@endsection