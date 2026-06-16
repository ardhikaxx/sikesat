@extends('layouts.app')
@section('title', 'Edit Kontrak - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-edit"></i> Edit Kontrak Pihak Ketiga</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('kontrak.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('kontrak.update', $kontrak->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Nomor Kontrak <span class="text-danger">*</span></label>
                    <input type="text" name="nomor_kontrak" class="form-control" required value="{{ $kontrak->nomor_kontrak }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Nama Vendor / Rekanan <span class="text-danger">*</span></label>
                    <input type="text" name="nama_vendor" class="form-control" required value="{{ $kontrak->nama_vendor }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Jenis Kontrak <span class="text-danger">*</span></label>
                    <select name="jenis_kontrak" class="form-select" required>
                        <option value="KSO_Alat" {{ $kontrak->jenis_kontrak == 'KSO_Alat' ? 'selected' : '' }}>KSO Alat</option>
                        <option value="Limbah_B3" {{ $kontrak->jenis_kontrak == 'Limbah_B3' ? 'selected' : '' }}>Pengelolaan Limbah B3</option>
                        <option value="IT_System" {{ $kontrak->jenis_kontrak == 'IT_System' ? 'selected' : '' }}>IT System & Software</option>
                        <option value="Jasa_Keamanan" {{ $kontrak->jenis_kontrak == 'Jasa_Keamanan' ? 'selected' : '' }}>Jasa Keamanan</option>
                        <option value="Jasa_Kebersihan" {{ $kontrak->jenis_kontrak == 'Jasa_Kebersihan' ? 'selected' : '' }}>Jasa Kebersihan</option>
                        <option value="Lainnya" {{ $kontrak->jenis_kontrak == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Nilai Kontrak (Rp)</label>
                    <input type="number" name="nilai_kontrak" class="form-control" value="{{ $kontrak->nilai_kontrak }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Tanggal Mulai <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal_mulai" class="form-control" required value="{{ $kontrak->tanggal_mulai ? $kontrak->tanggal_mulai->format('Y-m-d') : '' }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Tanggal Selesai <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal_selesai" class="form-control" required value="{{ $kontrak->tanggal_selesai ? $kontrak->tanggal_selesai->format('Y-m-d') : '' }}">
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label fw-semibold">Keterangan / Ruang Lingkup</label>
                    <textarea name="keterangan" class="form-control" rows="3">{{ $kontrak->keterangan }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-select" required>
                        <option value="Aktif" {{ $kontrak->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Selesai" {{ $kontrak->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="Dihentikan" {{ $kontrak->status == 'Dihentikan' ? 'selected' : '' }}>Dihentikan</option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection
