@extends('layouts.app')
@section('title', 'Edit Tarif - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Edit Tarif Layanan</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('tarif-layanan.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('tarif-layanan.update', $tarifLayanan->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                    <select name="kategori" class="form-select" required>
                        <option value="Tindakan" {{ $tarifLayanan->kategori == 'Tindakan' ? 'selected' : '' }}>Tindakan / Jasa Medis</option>
                        <option value="Kamar" {{ $tarifLayanan->kategori == 'Kamar' ? 'selected' : '' }}>Kamar Rawat Inap</option>
                        <option value="Lainnya" {{ $tarifLayanan->kategori == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Nama Layanan / Kamar / Tindakan <span class="text-danger">*</span></label>
                    <input type="text" name="nama_layanan" class="form-control" required value="{{ $tarifLayanan->nama_layanan }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Tarif (Rp) <span class="text-danger">*</span></label>
                    <input type="number" name="tarif" class="form-control" required min="0" value="{{ (int)$tarifLayanan->tarif }}">
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Tarif</button>
        </form>
    </div>
</div>
@endsection
