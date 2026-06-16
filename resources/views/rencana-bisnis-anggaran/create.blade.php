@extends('layouts.app')
@section('title', 'Tambah RencanaBisnisAnggaran - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Tambah RencanaBisnisAnggaran</h1>
        <a href="{{ route('rencana-bisnis-anggaran.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('rencana-bisnis-anggaran.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Tahun Anggaran Id</label>
                <input type="text" name="tahun_anggaran_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Unit Id</label>
                <input type="text" name="unit_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jenis</label>
                <input type="text" name="jenis" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Akun Id</label>
                <input type="text" name="akun_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Sumber Dana Id</label>
                <input type="text" name="sumber_dana_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Target Triwulan 1</label>
                <input type="text" name="target_triwulan_1" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Target Triwulan 2</label>
                <input type="text" name="target_triwulan_2" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Target Triwulan 3</label>
                <input type="text" name="target_triwulan_3" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Target Triwulan 4</label>
                <input type="text" name="target_triwulan_4" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Total Target</label>
                <input type="text" name="total_target" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Status</label>
                <input type="text" name="status" class="form-control" required>
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
                <label class="form-label fw-semibold">Catatan</label>
                <input type="text" name="catatan" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
        </form>
    </div>
</div>
@endsection