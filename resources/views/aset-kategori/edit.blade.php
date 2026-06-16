@extends('layouts.app')
@section('title', 'Edit AsetKategori - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-edit"></i> Edit AsetKategori</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('aset-kategori.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('aset-kategori.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">Kode</label>
                <input type="text" name="kode" class="form-control" value="{{ $data->kode }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $data->nama }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Jenis</label>
                <input type="text" name="jenis" class="form-control" value="{{ $data->jenis }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Masa Manfaat Tahun</label>
                <input type="text" name="masa_manfaat_tahun" class="form-control" value="{{ $data->masa_manfaat_tahun }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Tarif Penyusutan</label>
                <input type="text" name="tarif_penyusutan" class="form-control" value="{{ $data->tarif_penyusutan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Akun Perolehan Id</label>
                <input type="text" name="akun_perolehan_id" class="form-control" value="{{ $data->akun_perolehan_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Akun Penyusutan Id</label>
                <input type="text" name="akun_penyusutan_id" class="form-control" value="{{ $data->akun_penyusutan_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Akun Akumulasi Id</label>
                <input type="text" name="akun_akumulasi_id" class="form-control" value="{{ $data->akun_akumulasi_id }}" required>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection