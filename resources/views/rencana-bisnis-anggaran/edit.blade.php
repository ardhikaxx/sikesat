@extends('layouts.app')
@section('title', 'Edit RencanaBisnisAnggaran - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Edit RencanaBisnisAnggaran</h1>
        <a href="{{ route('rencana-bisnis-anggaran.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('rencana-bisnis-anggaran.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Tahun Anggaran Id</label>
                <input type="text" name="tahun_anggaran_id" class="form-control" value="{{ $data->tahun_anggaran_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Unit Id</label>
                <input type="text" name="unit_id" class="form-control" value="{{ $data->unit_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jenis</label>
                <input type="text" name="jenis" class="form-control" value="{{ $data->jenis }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Akun Id</label>
                <input type="text" name="akun_id" class="form-control" value="{{ $data->akun_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Sumber Dana Id</label>
                <input type="text" name="sumber_dana_id" class="form-control" value="{{ $data->sumber_dana_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Target Triwulan 1</label>
                <input type="text" name="target_triwulan_1" class="form-control" value="{{ $data->target_triwulan_1 }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Target Triwulan 2</label>
                <input type="text" name="target_triwulan_2" class="form-control" value="{{ $data->target_triwulan_2 }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Target Triwulan 3</label>
                <input type="text" name="target_triwulan_3" class="form-control" value="{{ $data->target_triwulan_3 }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Target Triwulan 4</label>
                <input type="text" name="target_triwulan_4" class="form-control" value="{{ $data->target_triwulan_4 }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Total Target</label>
                <input type="text" name="total_target" class="form-control" value="{{ $data->total_target }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Status</label>
                <input type="text" name="status" class="form-control" value="{{ $data->status }}" required>
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
                <label class="form-label fw-semibold">Catatan</label>
                <input type="text" name="catatan" class="form-control" value="{{ $data->catatan }}" required>
            </div>
            <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Update</button>
        </form>
    </div>
</div>
@endsection