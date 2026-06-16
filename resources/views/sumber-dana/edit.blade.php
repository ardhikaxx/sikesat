@extends('layouts.app')
@section('title', 'Edit SumberDana - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-edit"></i> Edit SumberDana</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('sumber-dana.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('sumber-dana.update', $data->id) }}" method="POST">
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
                <label class="form-label fw-bold">Tahun Anggaran</label>
                <input type="text" name="tahun_anggaran" class="form-control" value="{{ $data->tahun_anggaran }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Total Pagu</label>
                <input type="text" name="total_pagu" class="form-control" value="{{ $data->total_pagu }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="{{ $data->keterangan }}" required>
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