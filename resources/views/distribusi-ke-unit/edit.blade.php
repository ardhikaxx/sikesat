@extends('layouts.app')
@section('title', 'Edit DistribusiKeUnit - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Edit DistribusiKeUnit</h1>
        <a href="{{ route('distribusi-ke-unit.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('distribusi-ke-unit.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">No Distribusi</label>
                <input type="text" name="no_distribusi" class="form-control" value="{{ $data->no_distribusi }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Tanggal</label>
                <input type="text" name="tanggal" class="form-control" value="{{ $data->tanggal }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Unit Tujuan Id</label>
                <input type="text" name="unit_tujuan_id" class="form-control" value="{{ $data->unit_tujuan_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Status</label>
                <input type="text" name="status" class="form-control" value="{{ $data->status }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Dikirim Oleh</label>
                <input type="text" name="dikirim_oleh" class="form-control" value="{{ $data->dikirim_oleh }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Diterima Oleh</label>
                <input type="text" name="diterima_oleh" class="form-control" value="{{ $data->diterima_oleh }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Catatan</label>
                <input type="text" name="catatan" class="form-control" value="{{ $data->catatan }}" required>
            </div>
            <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Update</button>
        </form>
    </div>
</div>
@endsection