@extends('layouts.app')
@section('title', 'Konfigurasi Sistem - SIKESAT')

@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-cogs"></i> Konfigurasi Sistem</h1>
        <p class="text-muted mb-0">Pengaturan dasar aplikasi, profil puskesmas, dan preferensi sistem.</p>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <div class="alert alert-info">
            <i class="fas fa-info-circle me-2"></i> Halaman ini sedang dalam tahap pengembangan (Under Construction). Pengaturan logo, nama puskesmas, dan API Key akan segera hadir di sini.
        </div>
        
        <form action="#" method="POST">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Nama Puskesmas</label>
                    <input type="text" class="form-control" value="{{ $config->nama_puskesmas ?? 'Puskesmas Percontohan' }}" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Alamat</label>
                    <input type="text" class="form-control" value="{{ $config->alamat ?? 'Jl. Merdeka No. 1, Kota Contoh' }}" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Kepala Puskesmas</label>
                    <input type="text" class="form-control" value="{{ $config->kepala_puskesmas ?? 'dr. H. Wahyu Hartono, M.Kes' }}" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="text" class="form-control" value="{{ $config->email ?? 'info@puskesmas.go.id' }}" readonly>
                </div>
            </div>
            <button type="button" class="btn btn-secondary mt-3" disabled><i class="fas fa-save"></i> Simpan Pengaturan</button>
        </form>
    </div>
</div>
@endsection
