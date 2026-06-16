@extends('layouts.app')
@section('title', 'Edit NeracaSaldo - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Edit NeracaSaldo</h1>
        <a href="{{ route('neraca-saldo.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('neraca-saldo.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Periode Bulan</label>
                <input type="text" name="periode_bulan" class="form-control" value="{{ $data->periode_bulan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Periode Tahun</label>
                <input type="text" name="periode_tahun" class="form-control" value="{{ $data->periode_tahun }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Akun Id</label>
                <input type="text" name="akun_id" class="form-control" value="{{ $data->akun_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Saldo Awal Debit</label>
                <input type="text" name="saldo_awal_debit" class="form-control" value="{{ $data->saldo_awal_debit }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Saldo Awal Kredit</label>
                <input type="text" name="saldo_awal_kredit" class="form-control" value="{{ $data->saldo_awal_kredit }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Mutasi Debit</label>
                <input type="text" name="mutasi_debit" class="form-control" value="{{ $data->mutasi_debit }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Mutasi Kredit</label>
                <input type="text" name="mutasi_kredit" class="form-control" value="{{ $data->mutasi_kredit }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Saldo Akhir Debit</label>
                <input type="text" name="saldo_akhir_debit" class="form-control" value="{{ $data->saldo_akhir_debit }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Saldo Akhir Kredit</label>
                <input type="text" name="saldo_akhir_kredit" class="form-control" value="{{ $data->saldo_akhir_kredit }}" required>
            </div>
            <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Update</button>
        </form>
    </div>
</div>
@endsection