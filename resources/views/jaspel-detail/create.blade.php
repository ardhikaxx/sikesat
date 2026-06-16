@extends('layouts.app')
@section('title', 'Tambah JaspelDetail - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-plus"></i> Tambah JaspelDetail</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('jaspel-detail.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('jaspel-detail.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Jaspel Perhitungan Id</label>
                <input type="text" name="jaspel_perhitungan_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Pegawai Id</label>
                <input type="text" name="pegawai_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Skor Total</label>
                <input type="text" name="skor_total" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nominal Diterima</label>
                <input type="text" name="nominal_diterima" class="form-control" required>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Data</button>
            </div>
        </form>
    </div>
</div>
@endsection