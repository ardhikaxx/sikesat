@extends('layouts.app')
@section('title', 'Tambah ObatAlkes - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Tambah ObatAlkes</h1>
        <a href="{{ route('obat-alkes.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('obat-alkes.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Kode Barang</label>
                <input type="text" name="kode_barang" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Generik</label>
                <input type="text" name="nama_generik" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Dagang</label>
                <input type="text" name="nama_dagang" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Kategori Id</label>
                <input type="text" name="kategori_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Satuan</label>
                <input type="text" name="satuan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Satuan Terkecil</label>
                <input type="text" name="satuan_terkecil" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Konversi</label>
                <input type="text" name="konversi" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Akun Persediaan Id</label>
                <input type="text" name="akun_persediaan_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Stok Minimum</label>
                <input type="text" name="stok_minimum" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Stok Maksimum</label>
                <input type="text" name="stok_maksimum" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Lokasi Penyimpanan</label>
                <input type="text" name="lokasi_penyimpanan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Suhu Penyimpanan</label>
                <input type="text" name="suhu_penyimpanan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Golongan</label>
                <input type="text" name="golongan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Is Aktif</label>
                <input type="text" name="is_aktif" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
        </form>
    </div>
</div>
@endsection