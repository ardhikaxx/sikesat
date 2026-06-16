@extends('layouts.app')
@section('title', 'Edit JurnalUmum - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-edit"></i> Edit JurnalUmum</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('jurnal-umum.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('jurnal-umum.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">No Jurnal</label>
                <input type="text" name="no_jurnal" class="form-control" value="{{ $data->no_jurnal }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Tanggal</label>
                <input type="text" name="tanggal" class="form-control" value="{{ $data->tanggal }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Jenis Jurnal</label>
                <input type="text" name="jenis_jurnal" class="form-control" value="{{ $data->jenis_jurnal }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Sumber</label>
                <input type="text" name="sumber" class="form-control" value="{{ $data->sumber }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Referensi Id</label>
                <input type="text" name="referensi_id" class="form-control" value="{{ $data->referensi_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Referensi Tipe</label>
                <input type="text" name="referensi_tipe" class="form-control" value="{{ $data->referensi_tipe }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">No Bukti Sumber</label>
                <input type="text" name="no_bukti_sumber" class="form-control" value="{{ $data->no_bukti_sumber }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="{{ $data->keterangan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Total Debit</label>
                <input type="text" name="total_debit" class="form-control" value="{{ $data->total_debit }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Total Kredit</label>
                <input type="text" name="total_kredit" class="form-control" value="{{ $data->total_kredit }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Status</label>
                <input type="text" name="status" class="form-control" value="{{ $data->status }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Dibuat Oleh</label>
                <input type="text" name="dibuat_oleh" class="form-control" value="{{ $data->dibuat_oleh }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Diposting Oleh</label>
                <input type="text" name="diposting_oleh" class="form-control" value="{{ $data->diposting_oleh }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Diposting At</label>
                <input type="text" name="diposting_at" class="form-control" value="{{ $data->diposting_at }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Void Oleh</label>
                <input type="text" name="void_oleh" class="form-control" value="{{ $data->void_oleh }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Void At</label>
                <input type="text" name="void_at" class="form-control" value="{{ $data->void_at }}" required>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection