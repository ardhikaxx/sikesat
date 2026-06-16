@extends('layouts.app')
@section('title', 'Tambah JurnalDetail - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-plus"></i> Tambah JurnalDetail</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('jurnal-detail.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('jurnal-detail.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Jurnal Id</label>
                <input type="text" name="jurnal_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Akun Id</label>
                <input type="text" name="akun_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Posisi</label>
                <input type="text" name="posisi" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jumlah</label>
                <input type="text" name="jumlah" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" required>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Data</button>
            </div>
        </form>
    </div>
</div>
@endsection