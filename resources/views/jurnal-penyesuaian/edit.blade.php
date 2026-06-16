@extends('layouts.app')
@section('title', 'Edit JurnalPenyesuaian - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-edit"></i> Edit JurnalPenyesuaian</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('jurnal-penyesuaian.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('jurnal-penyesuaian.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">Tahun Anggaran Id</label>
                <input type="text" name="tahun_anggaran_id" class="form-control" value="{{ $data->tahun_anggaran_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Tanggal</label>
                <input type="text" name="tanggal" class="form-control" value="{{ $data->tanggal }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Jenis</label>
                <input type="text" name="jenis" class="form-control" value="{{ $data->jenis }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="{{ $data->keterangan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Status</label>
                <input type="text" name="status" class="form-control" value="{{ $data->status }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Disetujui Oleh</label>
                <input type="text" name="disetujui_oleh" class="form-control" value="{{ $data->disetujui_oleh }}" required>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection