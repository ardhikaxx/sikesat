@extends('layouts.app')
@section('title', 'Tambah PenerimaanKas - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Tambah PenerimaanKas</h1>
        <a href="{{ route('penerimaan-kas.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('penerimaan-kas.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">No Bukti</label>
                <input type="text" name="no_bukti" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Tanggal</label>
                <input type="text" name="tanggal" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jenis Penerimaan</label>
                <input type="text" name="jenis_penerimaan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Sumber Dana Id</label>
                <input type="text" name="sumber_dana_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Unit Id</label>
                <input type="text" name="unit_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Pasien Id</label>
                <input type="text" name="pasien_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jumlah</label>
                <input type="text" name="jumlah" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Metode Pembayaran</label>
                <input type="text" name="metode_pembayaran" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">No Referensi</label>
                <input type="text" name="no_referensi" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Status</label>
                <input type="text" name="status" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Status Jurnal</label>
                <input type="text" name="status_jurnal" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Input Oleh</label>
                <input type="text" name="input_oleh" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Diverifikasi Oleh</label>
                <input type="text" name="diverifikasi_oleh" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Diverifikasi At</label>
                <input type="text" name="diverifikasi_at" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Void Oleh</label>
                <input type="text" name="void_oleh" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Void At</label>
                <input type="text" name="void_at" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Alasan Void</label>
                <input type="text" name="alasan_void" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
        </form>
    </div>
</div>
@endsection