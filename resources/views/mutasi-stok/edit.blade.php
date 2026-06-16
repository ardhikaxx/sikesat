@extends('layouts.app')
@section('title', 'Edit MutasiStok - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-edit"></i> Edit MutasiStok</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('mutasi-stok.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('mutasi-stok.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">Obat Alkes Id</label>
                <input type="text" name="obat_alkes_id" class="form-control" value="{{ $data->obat_alkes_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Stok Gudang Id</label>
                <input type="text" name="stok_gudang_id" class="form-control" value="{{ $data->stok_gudang_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Tanggal</label>
                <input type="text" name="tanggal" class="form-control" value="{{ $data->tanggal }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Jenis</label>
                <input type="text" name="jenis" class="form-control" value="{{ $data->jenis }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Jumlah</label>
                <input type="text" name="jumlah" class="form-control" value="{{ $data->jumlah }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Saldo Sesudah</label>
                <input type="text" name="saldo_sesudah" class="form-control" value="{{ $data->saldo_sesudah }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Sumber</label>
                <input type="text" name="sumber" class="form-control" value="{{ $data->sumber }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Referensi Id</label>
                <input type="text" name="referensi_id" class="form-control" value="{{ $data->referensi_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Unit Tujuan Id</label>
                <input type="text" name="unit_tujuan_id" class="form-control" value="{{ $data->unit_tujuan_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="{{ $data->keterangan }}" required>
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