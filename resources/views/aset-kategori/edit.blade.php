@extends('layouts.app')
@section('title', 'Edit AsetKategori - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Edit AsetKategori</h1>
        <a href="{{ route('aset-kategori.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('aset-kategori.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Kode</label>
                <input type="text" name="kode" class="form-control" value="{{ $data->kode }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $data->nama }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jenis</label>
                <input type="text" name="jenis" class="form-control" value="{{ $data->jenis }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Masa Manfaat Tahun</label>
                <input type="text" name="masa_manfaat_tahun" class="form-control" value="{{ $data->masa_manfaat_tahun }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Tarif Penyusutan</label>
                <input type="text" name="tarif_penyusutan" class="form-control" value="{{ $data->tarif_penyusutan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Akun Perolehan Id</label>
                <input type="text" name="akun_perolehan_id" class="form-control" value="{{ $data->akun_perolehan_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Akun Penyusutan Id</label>
                <input type="text" name="akun_penyusutan_id" class="form-control" value="{{ $data->akun_penyusutan_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Akun Akumulasi Id</label>
                <input type="text" name="akun_akumulasi_id" class="form-control" value="{{ $data->akun_akumulasi_id }}" required>
            </div>
            <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Update</button>
        </form>
    </div>
</div>
@endsection