@extends('layouts.app')
@section('title', 'Edit PemeliharaanAset - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Edit PemeliharaanAset</h1>
        <a href="{{ route('pemeliharaan-aset.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('pemeliharaan-aset.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Aset Id</label>
                <input type="text" name="aset_id" class="form-control" value="{{ $data->aset_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Tanggal</label>
                <input type="text" name="tanggal" class="form-control" value="{{ $data->tanggal }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jenis Pemeliharaan</label>
                <input type="text" name="jenis_pemeliharaan" class="form-control" value="{{ $data->jenis_pemeliharaan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Biaya</label>
                <input type="text" name="biaya" class="form-control" value="{{ $data->biaya }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Pengeluaran Id</label>
                <input type="text" name="pengeluaran_id" class="form-control" value="{{ $data->pengeluaran_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Kondisi Sebelum</label>
                <input type="text" name="kondisi_sebelum" class="form-control" value="{{ $data->kondisi_sebelum }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Kondisi Sesudah</label>
                <input type="text" name="kondisi_sesudah" class="form-control" value="{{ $data->kondisi_sesudah }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Dilakukan Oleh</label>
                <input type="text" name="dilakukan_oleh" class="form-control" value="{{ $data->dilakukan_oleh }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="{{ $data->keterangan }}" required>
            </div>
            <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Update</button>
        </form>
    </div>
</div>
@endsection