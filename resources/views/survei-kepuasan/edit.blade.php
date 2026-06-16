@extends('layouts.app')
@section('title', 'Edit SurveiKepuasan - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-edit"></i> Edit SurveiKepuasan</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('survei-kepuasan.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('survei-kepuasan.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">Unit Id</label>
                <input type="text" name="unit_id" class="form-control" value="{{ $data->unit_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Periode Bulan</label>
                <input type="text" name="periode_bulan" class="form-control" value="{{ $data->periode_bulan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Periode Tahun</label>
                <input type="text" name="periode_tahun" class="form-control" value="{{ $data->periode_tahun }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Jumlah Responden</label>
                <input type="text" name="jumlah_responden" class="form-control" value="{{ $data->jumlah_responden }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Skor Rata Rata</label>
                <input type="text" name="skor_rata_rata" class="form-control" value="{{ $data->skor_rata_rata }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Persentase Puas</label>
                <input type="text" name="persentase_puas" class="form-control" value="{{ $data->persentase_puas }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="{{ $data->keterangan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Input Oleh</label>
                <input type="text" name="input_oleh" class="form-control" value="{{ $data->input_oleh }}" required>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection