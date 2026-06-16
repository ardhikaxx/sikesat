@extends('layouts.app')
@section('title', 'Tambah Kontrak - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-plus"></i> Tambah Kontrak Pihak Ketiga</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('kontrak.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('kontrak.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Nomor Kontrak <span class="text-danger">*</span></label>
                    <input type="text" name="nomor_kontrak" class="form-control" required placeholder="Contoh: KTR/2026/001">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Nama Vendor / Rekanan <span class="text-danger">*</span></label>
                    <input type="text" name="nama_vendor" class="form-control" required placeholder="Contoh: PT Medika Jaya">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Jenis Kontrak <span class="text-danger">*</span></label>
                    <select name="jenis_kontrak" class="form-select" required>
                        <option value="KSO_Alat">KSO Alat</option>
                        <option value="Limbah_B3">Pengelolaan Limbah B3</option>
                        <option value="IT_System">IT System & Software</option>
                        <option value="Jasa_Keamanan">Jasa Keamanan</option>
                        <option value="Jasa_Kebersihan">Jasa Kebersihan</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Nilai Kontrak (Rp)</label>
                    <input type="number" name="nilai_kontrak" class="form-control" value="0">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Tanggal Mulai <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal_mulai" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Tanggal Selesai <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal_selesai" class="form-control" required>
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label fw-semibold">Keterangan / Ruang Lingkup</label>
                    <textarea name="keterangan" class="form-control" rows="3"></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-select" required>
                        <option value="Aktif">Aktif</option>
                        <option value="Selesai">Selesai</option>
                        <option value="Dihentikan">Dihentikan</option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Data</button>
            </div>
        </form>
    </div>
</div>
@endsection
