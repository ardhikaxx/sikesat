@extends('layouts.app')
@section('title', 'Edit PengeluaranKas - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Edit PengeluaranKas</h1>
        <a href="{{ route('pengeluaran-kas.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('pengeluaran-kas.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">No Bukti</label>
                <input type="text" name="no_bukti" class="form-control" value="{{ $data->no_bukti }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Tanggal</label>
                <input type="text" name="tanggal" class="form-control" value="{{ $data->tanggal }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Pengajuan Id</label>
                <input type="text" name="pengajuan_id" class="form-control" value="{{ $data->pengajuan_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Supplier Id</label>
                <input type="text" name="supplier_id" class="form-control" value="{{ $data->supplier_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jenis Pengeluaran</label>
                <input type="text" name="jenis_pengeluaran" class="form-control" value="{{ $data->jenis_pengeluaran }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Sumber Dana Id</label>
                <input type="text" name="sumber_dana_id" class="form-control" value="{{ $data->sumber_dana_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Rka Id</label>
                <input type="text" name="rka_id" class="form-control" value="{{ $data->rka_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">No Spd</label>
                <input type="text" name="no_spd" class="form-control" value="{{ $data->no_spd }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">No Spm</label>
                <input type="text" name="no_spm" class="form-control" value="{{ $data->no_spm }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">No Sp2d</label>
                <input type="text" name="no_sp2d" class="form-control" value="{{ $data->no_sp2d }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Metode Pembayaran</label>
                <input type="text" name="metode_pembayaran" class="form-control" value="{{ $data->metode_pembayaran }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">No Referensi</label>
                <input type="text" name="no_referensi" class="form-control" value="{{ $data->no_referensi }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jumlah Bruto</label>
                <input type="text" name="jumlah_bruto" class="form-control" value="{{ $data->jumlah_bruto }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Pajak Ppn</label>
                <input type="text" name="pajak_ppn" class="form-control" value="{{ $data->pajak_ppn }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Pajak Pph</label>
                <input type="text" name="pajak_pph" class="form-control" value="{{ $data->pajak_pph }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jumlah Neto</label>
                <input type="text" name="jumlah_neto" class="form-control" value="{{ $data->jumlah_neto }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="{{ $data->keterangan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">No Faktur</label>
                <input type="text" name="no_faktur" class="form-control" value="{{ $data->no_faktur }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Tanggal Faktur</label>
                <input type="text" name="tanggal_faktur" class="form-control" value="{{ $data->tanggal_faktur }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Status</label>
                <input type="text" name="status" class="form-control" value="{{ $data->status }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Status Jurnal</label>
                <input type="text" name="status_jurnal" class="form-control" value="{{ $data->status_jurnal }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Input Oleh</label>
                <input type="text" name="input_oleh" class="form-control" value="{{ $data->input_oleh }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Diverifikasi Oleh</label>
                <input type="text" name="diverifikasi_oleh" class="form-control" value="{{ $data->diverifikasi_oleh }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Diverifikasi At</label>
                <input type="text" name="diverifikasi_at" class="form-control" value="{{ $data->diverifikasi_at }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Disetujui Oleh</label>
                <input type="text" name="disetujui_oleh" class="form-control" value="{{ $data->disetujui_oleh }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Disetujui At</label>
                <input type="text" name="disetujui_at" class="form-control" value="{{ $data->disetujui_at }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Dibayar Oleh</label>
                <input type="text" name="dibayar_oleh" class="form-control" value="{{ $data->dibayar_oleh }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Dibayar At</label>
                <input type="text" name="dibayar_at" class="form-control" value="{{ $data->dibayar_at }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Void Oleh</label>
                <input type="text" name="void_oleh" class="form-control" value="{{ $data->void_oleh }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Void At</label>
                <input type="text" name="void_at" class="form-control" value="{{ $data->void_at }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Alasan Void</label>
                <input type="text" name="alasan_void" class="form-control" value="{{ $data->alasan_void }}" required>
            </div>
            <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Update</button>
        </form>
    </div>
</div>
@endsection