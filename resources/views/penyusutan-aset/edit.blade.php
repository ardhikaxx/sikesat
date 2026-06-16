@extends('layouts.app')
@section('title', 'Edit PenyusutanAset - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Edit PenyusutanAset</h1>
        <a href="{{ route('penyusutan-aset.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('penyusutan-aset.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Aset Id</label>
                <input type="text" name="aset_id" class="form-control" value="{{ $data->aset_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Periode Bulan</label>
                <input type="text" name="periode_bulan" class="form-control" value="{{ $data->periode_bulan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Periode Tahun</label>
                <input type="text" name="periode_tahun" class="form-control" value="{{ $data->periode_tahun }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nilai Penyusutan</label>
                <input type="text" name="nilai_penyusutan" class="form-control" value="{{ $data->nilai_penyusutan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Akumulasi Penyusutan</label>
                <input type="text" name="akumulasi_penyusutan" class="form-control" value="{{ $data->akumulasi_penyusutan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nilai Buku Sesudah</label>
                <input type="text" name="nilai_buku_sesudah" class="form-control" value="{{ $data->nilai_buku_sesudah }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jurnal Id</label>
                <input type="text" name="jurnal_id" class="form-control" value="{{ $data->jurnal_id }}" required>
            </div>
            <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Update</button>
        </form>
    </div>
</div>
@endsection