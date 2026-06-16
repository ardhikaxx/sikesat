@extends('layouts.app')
@section('title', 'Tambah BukuBesar - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Tambah BukuBesar</h1>
        <a href="{{ route('buku-besar.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('buku-besar.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Akun Id</label>
                <input type="text" name="akun_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jurnal Detail Id</label>
                <input type="text" name="jurnal_detail_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Tanggal</label>
                <input type="text" name="tanggal" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">No Jurnal</label>
                <input type="text" name="no_jurnal" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Debit</label>
                <input type="text" name="debit" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Kredit</label>
                <input type="text" name="kredit" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Saldo</label>
                <input type="text" name="saldo" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
        </form>
    </div>
</div>
@endsection