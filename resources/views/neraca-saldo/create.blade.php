@extends('layouts.app')
@section('title', 'Tambah NeracaSaldo - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-plus"></i> Tambah NeracaSaldo</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('neraca-saldo.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('neraca-saldo.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Periode Bulan</label>
                <input type="text" name="periode_bulan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Periode Tahun</label>
                <input type="text" name="periode_tahun" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Akun Id</label>
                <input type="text" name="akun_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Saldo Awal Debit</label>
                <input type="text" name="saldo_awal_debit" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Saldo Awal Kredit</label>
                <input type="text" name="saldo_awal_kredit" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Mutasi Debit</label>
                <input type="text" name="mutasi_debit" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Mutasi Kredit</label>
                <input type="text" name="mutasi_kredit" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Saldo Akhir Debit</label>
                <input type="text" name="saldo_akhir_debit" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Saldo Akhir Kredit</label>
                <input type="text" name="saldo_akhir_kredit" class="form-control" required>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Data</button>
            </div>
        </form>
    </div>
</div>
@endsection