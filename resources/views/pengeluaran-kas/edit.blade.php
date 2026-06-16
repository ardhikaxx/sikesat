@extends('layouts.app')
@section('title', 'Edit PengeluaranKas - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-edit"></i> Edit PengeluaranKas</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('pengeluaran-kas.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('pengeluaran-kas.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">No Bukti</label>
                <input type="text" name="no_bukti" class="form-control" value="{{ $data->no_bukti }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Tanggal</label>
                <input type="text" name="tanggal" class="form-control" value="{{ $data->tanggal }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Pengajuan Id</label>
                <input type="text" name="pengajuan_id" class="form-control" value="{{ $data->pengajuan_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Supplier Id</label>
                <input type="text" name="supplier_id" class="form-control" value="{{ $data->supplier_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Jenis Pengeluaran</label>
                <input type="text" name="jenis_pengeluaran" class="form-control" value="{{ $data->jenis_pengeluaran }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Sumber Dana Id</label>
                <input type="text" name="sumber_dana_id" class="form-control" value="{{ $data->sumber_dana_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Rka Id</label>
                <input type="text" name="rka_id" class="form-control" value="{{ $data->rka_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">No Spd</label>
                <input type="text" name="no_spd" class="form-control" value="{{ $data->no_spd }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">No Spm</label>
                <input type="text" name="no_spm" class="form-control" value="{{ $data->no_spm }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">No Sp2d</label>
                <input type="text" name="no_sp2d" class="form-control" value="{{ $data->no_sp2d }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Metode Pembayaran</label>
                <input type="text" name="metode_pembayaran" class="form-control" value="{{ $data->metode_pembayaran }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">No Referensi</label>
                <input type="text" name="no_referensi" class="form-control" value="{{ $data->no_referensi }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Jumlah Bruto</label>
                <input type="text" name="jumlah_bruto" class="form-control" value="{{ $data->jumlah_bruto }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Pajak Ppn</label>
                <input type="text" name="pajak_ppn" class="form-control" value="{{ $data->pajak_ppn }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Pajak Pph</label>
                <input type="text" name="pajak_pph" class="form-control" value="{{ $data->pajak_pph }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Jumlah Neto</label>
                <input type="text" name="jumlah_neto" class="form-control" value="{{ $data->jumlah_neto }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="{{ $data->keterangan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">No Faktur</label>
                <input type="text" name="no_faktur" class="form-control" value="{{ $data->no_faktur }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Tanggal Faktur</label>
                <input type="text" name="tanggal_faktur" class="form-control" value="{{ $data->tanggal_faktur }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Status</label>
                <input type="text" name="status" class="form-control" value="{{ $data->status }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Status Jurnal</label>
                <input type="text" name="status_jurnal" class="form-control" value="{{ $data->status_jurnal }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Input Oleh</label>
                <input type="text" name="input_oleh" class="form-control" value="{{ $data->input_oleh }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Diverifikasi Oleh</label>
                <input type="text" name="diverifikasi_oleh" class="form-control" value="{{ $data->diverifikasi_oleh }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Diverifikasi At</label>
                <input type="text" name="diverifikasi_at" class="form-control" value="{{ $data->diverifikasi_at }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Disetujui Oleh</label>
                <input type="text" name="disetujui_oleh" class="form-control" value="{{ $data->disetujui_oleh }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Disetujui At</label>
                <input type="text" name="disetujui_at" class="form-control" value="{{ $data->disetujui_at }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Dibayar Oleh</label>
                <input type="text" name="dibayar_oleh" class="form-control" value="{{ $data->dibayar_oleh }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Dibayar At</label>
                <input type="text" name="dibayar_at" class="form-control" value="{{ $data->dibayar_at }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Void Oleh</label>
                <input type="text" name="void_oleh" class="form-control" value="{{ $data->void_oleh }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Void At</label>
                <input type="text" name="void_at" class="form-control" value="{{ $data->void_at }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Alasan Void</label>
                <input type="text" name="alasan_void" class="form-control" value="{{ $data->alasan_void }}" required>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection