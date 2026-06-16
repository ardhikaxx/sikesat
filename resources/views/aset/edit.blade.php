@extends('layouts.app')
@section('title', 'Edit Aset - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Edit Aset</h1>
        <a href="{{ route('aset.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('aset.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Kode Aset</label>
                <input type="text" name="kode_aset" class="form-control" value="{{ $data->kode_aset }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Aset</label>
                <input type="text" name="nama_aset" class="form-control" value="{{ $data->nama_aset }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Kategori Id</label>
                <input type="text" name="kategori_id" class="form-control" value="{{ $data->kategori_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Unit Id</label>
                <input type="text" name="unit_id" class="form-control" value="{{ $data->unit_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Pengeluaran Detail Id</label>
                <input type="text" name="pengeluaran_detail_id" class="form-control" value="{{ $data->pengeluaran_detail_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Tanggal Perolehan</label>
                <input type="text" name="tanggal_perolehan" class="form-control" value="{{ $data->tanggal_perolehan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nilai Perolehan</label>
                <input type="text" name="nilai_perolehan" class="form-control" value="{{ $data->nilai_perolehan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Masa Manfaat Tahun</label>
                <input type="text" name="masa_manfaat_tahun" class="form-control" value="{{ $data->masa_manfaat_tahun }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Metode Penyusutan</label>
                <input type="text" name="metode_penyusutan" class="form-control" value="{{ $data->metode_penyusutan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Akumulasi Penyusutan</label>
                <input type="text" name="akumulasi_penyusutan" class="form-control" value="{{ $data->akumulasi_penyusutan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nilai Buku</label>
                <input type="text" name="nilai_buku" class="form-control" value="{{ $data->nilai_buku }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Kondisi</label>
                <input type="text" name="kondisi" class="form-control" value="{{ $data->kondisi }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">No Seri</label>
                <input type="text" name="no_seri" class="form-control" value="{{ $data->no_seri }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Spesifikasi</label>
                <input type="text" name="spesifikasi" class="form-control" value="{{ $data->spesifikasi }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Lokasi Detail</label>
                <input type="text" name="lokasi_detail" class="form-control" value="{{ $data->lokasi_detail }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Status</label>
                <input type="text" name="status" class="form-control" value="{{ $data->status }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="{{ $data->keterangan }}" required>
            </div>
            <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Update</button>
        </form>
    </div>
</div>
@endsection