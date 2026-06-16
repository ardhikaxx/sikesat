@extends('layouts.app')
@section('title', 'Tambah PengeluaranKas - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-plus"></i> Tambah PengeluaranKas</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('pengeluaran-kas.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('pengeluaran-kas.store') }}" method="POST">
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
                <label class="form-label fw-semibold">Pengajuan Id</label>
                <input type="text" name="pengajuan_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Supplier Id</label>
                <input type="text" name="supplier_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jenis Pengeluaran</label>
                <input type="text" name="jenis_pengeluaran" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Sumber Dana Id</label>
                <input type="text" name="sumber_dana_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Rka Id</label>
                <input type="text" name="rka_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">No Spd</label>
                <input type="text" name="no_spd" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">No Spm</label>
                <input type="text" name="no_spm" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">No Sp2d</label>
                <input type="text" name="no_sp2d" class="form-control" required>
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
                <label class="form-label fw-semibold">Jumlah Bruto</label>
                <input type="text" name="jumlah_bruto" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Pajak Ppn</label>
                <input type="text" name="pajak_ppn" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Pajak Pph</label>
                <input type="text" name="pajak_pph" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jumlah Neto</label>
                <input type="text" name="jumlah_neto" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">No Faktur</label>
                <input type="text" name="no_faktur" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Tanggal Faktur</label>
                <input type="text" name="tanggal_faktur" class="form-control" required>
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
                <label class="form-label fw-semibold">Disetujui Oleh</label>
                <input type="text" name="disetujui_oleh" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Disetujui At</label>
                <input type="text" name="disetujui_at" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Dibayar Oleh</label>
                <input type="text" name="dibayar_oleh" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Dibayar At</label>
                <input type="text" name="dibayar_at" class="form-control" required>
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
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Data</button>
            </div>
        </form>
    </div>
</div>
@endsection