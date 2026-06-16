@extends('layouts.app')
@section('title', 'Edit MutasiStok - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Edit MutasiStok</h1>
        <a href="{{ route('mutasi-stok.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('mutasi-stok.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Obat Alkes Id</label>
                <input type="text" name="obat_alkes_id" class="form-control" value="{{ $data->obat_alkes_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Stok Gudang Id</label>
                <input type="text" name="stok_gudang_id" class="form-control" value="{{ $data->stok_gudang_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Tanggal</label>
                <input type="text" name="tanggal" class="form-control" value="{{ $data->tanggal }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jenis</label>
                <input type="text" name="jenis" class="form-control" value="{{ $data->jenis }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jumlah</label>
                <input type="text" name="jumlah" class="form-control" value="{{ $data->jumlah }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Saldo Sesudah</label>
                <input type="text" name="saldo_sesudah" class="form-control" value="{{ $data->saldo_sesudah }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Sumber</label>
                <input type="text" name="sumber" class="form-control" value="{{ $data->sumber }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Referensi Id</label>
                <input type="text" name="referensi_id" class="form-control" value="{{ $data->referensi_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Unit Tujuan Id</label>
                <input type="text" name="unit_tujuan_id" class="form-control" value="{{ $data->unit_tujuan_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="{{ $data->keterangan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Input Oleh</label>
                <input type="text" name="input_oleh" class="form-control" value="{{ $data->input_oleh }}" required>
            </div>
            <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Update</button>
        </form>
    </div>
</div>
@endsection