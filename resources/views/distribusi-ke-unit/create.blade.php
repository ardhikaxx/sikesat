@extends('layouts.app')
@section('title', 'Tambah DistribusiKeUnit - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-plus"></i> Tambah DistribusiKeUnit</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('distribusi-ke-unit.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('distribusi-ke-unit.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">No Distribusi</label>
                <input type="text" name="no_distribusi" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Tanggal</label>
                <input type="text" name="tanggal" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Unit Tujuan Id</label>
                <input type="text" name="unit_tujuan_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Status</label>
                <input type="text" name="status" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Dikirim Oleh</label>
                <input type="text" name="dikirim_oleh" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Diterima Oleh</label>
                <input type="text" name="diterima_oleh" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Catatan</label>
                <input type="text" name="catatan" class="form-control" required>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Data</button>
            </div>
        </form>
    </div>
</div>
@endsection