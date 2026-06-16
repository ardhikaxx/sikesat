@extends('layouts.app')
@section('title', 'Tambah Aset - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-plus"></i> Tambah Aset</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('aset.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('aset.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Kode Aset</label>
                <input type="text" name="kode_aset" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Aset</label>
                <input type="text" name="nama_aset" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Kategori Id</label>
                <input type="text" name="kategori_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Unit Id</label>
                <input type="text" name="unit_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Pengeluaran Detail Id</label>
                <input type="text" name="pengeluaran_detail_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Tanggal Perolehan</label>
                <input type="text" name="tanggal_perolehan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nilai Perolehan</label>
                <input type="text" name="nilai_perolehan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Masa Manfaat Tahun</label>
                <input type="text" name="masa_manfaat_tahun" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Metode Penyusutan</label>
                <input type="text" name="metode_penyusutan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Akumulasi Penyusutan</label>
                <input type="text" name="akumulasi_penyusutan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nilai Buku</label>
                <input type="text" name="nilai_buku" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Kondisi</label>
                <input type="text" name="kondisi" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">No Seri</label>
                <input type="text" name="no_seri" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Spesifikasi</label>
                <input type="text" name="spesifikasi" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Lokasi Detail</label>
                <input type="text" name="lokasi_detail" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Status</label>
                <input type="text" name="status" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" required>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Data</button>
            </div>
        </form>
    </div>
</div>
@endsection