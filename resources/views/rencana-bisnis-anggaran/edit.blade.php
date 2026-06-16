@extends('layouts.app')
@section('title', 'Edit RencanaBisnisAnggaran - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-edit"></i> Edit RencanaBisnisAnggaran</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('rencana-bisnis-anggaran.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('rencana-bisnis-anggaran.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">Tahun Anggaran Id</label>
                <input type="text" name="tahun_anggaran_id" class="form-control" value="{{ $data->tahun_anggaran_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Unit Id</label>
                <input type="text" name="unit_id" class="form-control" value="{{ $data->unit_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Jenis</label>
                <input type="text" name="jenis" class="form-control" value="{{ $data->jenis }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Akun Id</label>
                <input type="text" name="akun_id" class="form-control" value="{{ $data->akun_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Sumber Dana Id</label>
                <input type="text" name="sumber_dana_id" class="form-control" value="{{ $data->sumber_dana_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Target Triwulan 1</label>
                <input type="text" name="target_triwulan_1" class="form-control" value="{{ $data->target_triwulan_1 }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Target Triwulan 2</label>
                <input type="text" name="target_triwulan_2" class="form-control" value="{{ $data->target_triwulan_2 }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Target Triwulan 3</label>
                <input type="text" name="target_triwulan_3" class="form-control" value="{{ $data->target_triwulan_3 }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Target Triwulan 4</label>
                <input type="text" name="target_triwulan_4" class="form-control" value="{{ $data->target_triwulan_4 }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Total Target</label>
                <input type="text" name="total_target" class="form-control" value="{{ $data->total_target }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Status</label>
                <input type="text" name="status" class="form-control" value="{{ $data->status }}" required>
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
                <label class="form-label fw-bold">Catatan</label>
                <input type="text" name="catatan" class="form-control" value="{{ $data->catatan }}" required>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection