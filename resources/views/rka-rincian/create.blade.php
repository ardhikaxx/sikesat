@extends('layouts.app')
@section('title', 'Tambah RkaRincian - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Tambah RkaRincian</h1>
        <a href="{{ route('rka-rincian.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('rka-rincian.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Rka Id</label>
                <input type="text" name="rka_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Akun Id</label>
                <input type="text" name="akun_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Uraian</label>
                <input type="text" name="uraian" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Volume</label>
                <input type="text" name="volume" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Satuan</label>
                <input type="text" name="satuan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Harga Satuan</label>
                <input type="text" name="harga_satuan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Total</label>
                <input type="text" name="total" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
        </form>
    </div>
</div>
@endsection