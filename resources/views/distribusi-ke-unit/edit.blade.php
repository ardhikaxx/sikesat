@extends('layouts.app')
@section('title', 'Edit DistribusiKeUnit - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-edit"></i> Edit DistribusiKeUnit</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('distribusi-ke-unit.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('distribusi-ke-unit.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">No Distribusi</label>
                <input type="text" name="no_distribusi" class="form-control" value="{{ $data->no_distribusi }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Tanggal</label>
                <input type="text" name="tanggal" class="form-control" value="{{ $data->tanggal }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Unit Tujuan Id</label>
                <input type="text" name="unit_tujuan_id" class="form-control" value="{{ $data->unit_tujuan_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Status</label>
                <input type="text" name="status" class="form-control" value="{{ $data->status }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Dikirim Oleh</label>
                <input type="text" name="dikirim_oleh" class="form-control" value="{{ $data->dikirim_oleh }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Diterima Oleh</label>
                <input type="text" name="diterima_oleh" class="form-control" value="{{ $data->diterima_oleh }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Catatan</label>
                <input type="text" name="catatan" class="form-control" value="{{ $data->catatan }}" required>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection