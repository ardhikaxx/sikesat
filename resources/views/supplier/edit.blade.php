@extends('layouts.app')
@section('title', 'Edit Supplier - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-edit"></i> Edit Supplier</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('supplier.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('supplier.update', $data->id) }}" method="POST">
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
                <label class="form-label fw-bold">Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ $data->alamat }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">No Telepon</label>
                <input type="text" name="no_telepon" class="form-control" value="{{ $data->no_telepon }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Email</label>
                <input type="text" name="email" class="form-control" value="{{ $data->email }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">NPWP</label>
                <input type="text" name="NPWP" class="form-control" value="{{ $data->NPWP }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Rekening</label>
                <input type="text" name="nama_rekening" class="form-control" value="{{ $data->nama_rekening }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">No Rekening</label>
                <input type="text" name="no_rekening" class="form-control" value="{{ $data->no_rekening }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Bank</label>
                <input type="text" name="nama_bank" class="form-control" value="{{ $data->nama_bank }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Is Aktif</label>
                <input type="text" name="is_aktif" class="form-control" value="{{ $data->is_aktif }}" required>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection