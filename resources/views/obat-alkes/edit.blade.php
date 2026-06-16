@extends('layouts.app')
@section('title', 'Edit ObatAlkes - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Edit ObatAlkes</h1>
        <a href="{{ route('obat-alkes.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('obat-alkes.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Kode Barang</label>
                <input type="text" name="kode_barang" class="form-control" value="{{ $data->kode_barang }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Generik</label>
                <input type="text" name="nama_generik" class="form-control" value="{{ $data->nama_generik }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Dagang</label>
                <input type="text" name="nama_dagang" class="form-control" value="{{ $data->nama_dagang }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Kategori Id</label>
                <input type="text" name="kategori_id" class="form-control" value="{{ $data->kategori_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Satuan</label>
                <input type="text" name="satuan" class="form-control" value="{{ $data->satuan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Satuan Terkecil</label>
                <input type="text" name="satuan_terkecil" class="form-control" value="{{ $data->satuan_terkecil }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Konversi</label>
                <input type="text" name="konversi" class="form-control" value="{{ $data->konversi }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Akun Persediaan Id</label>
                <input type="text" name="akun_persediaan_id" class="form-control" value="{{ $data->akun_persediaan_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Stok Minimum</label>
                <input type="text" name="stok_minimum" class="form-control" value="{{ $data->stok_minimum }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Stok Maksimum</label>
                <input type="text" name="stok_maksimum" class="form-control" value="{{ $data->stok_maksimum }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Lokasi Penyimpanan</label>
                <input type="text" name="lokasi_penyimpanan" class="form-control" value="{{ $data->lokasi_penyimpanan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Suhu Penyimpanan</label>
                <input type="text" name="suhu_penyimpanan" class="form-control" value="{{ $data->suhu_penyimpanan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Golongan</label>
                <input type="text" name="golongan" class="form-control" value="{{ $data->golongan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Is Aktif</label>
                <input type="text" name="is_aktif" class="form-control" value="{{ $data->is_aktif }}" required>
            </div>
            <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Update</button>
        </form>
    </div>
</div>
@endsection