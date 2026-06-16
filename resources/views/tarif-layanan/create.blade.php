@extends('layouts.app')
@section('title', 'Tambah Tarif - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Tambah Tarif Layanan</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('tarif-layanan.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('tarif-layanan.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                    <select name="kategori" class="form-select" required>
                        <option value="Tindakan">Tindakan / Jasa Medis</option>
                        <option value="Kamar">Kamar Rawat Inap</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Nama Layanan / Kamar / Tindakan <span class="text-danger">*</span></label>
                    <input type="text" name="nama_layanan" class="form-control" required placeholder="Contoh: Rawat Inap Kelas 1, EKG, dll">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Tarif (Rp) <span class="text-danger">*</span></label>
                    <input type="number" name="tarif" class="form-control" required min="0" placeholder="0">
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Tarif</button>
        </form>
    </div>
</div>
@endsection
