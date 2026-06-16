@extends('layouts.app')
@section('title', 'Edit Aset - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-edit"></i> Edit Aset</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('aset.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <form action="{{ route('aset.update', $data->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">Kode Aset</label>
                <input type="text" name="kode_aset" class="form-control" value="{{ $data->kode_aset }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Aset</label>
                <input type="text" name="nama_aset" class="form-control" value="{{ $data->nama_aset }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Kategori Id</label>
                <input type="text" name="kategori_id" class="form-control" value="{{ $data->kategori_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Unit Id</label>
                <input type="text" name="unit_id" class="form-control" value="{{ $data->unit_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Pengeluaran Detail Id</label>
                <input type="text" name="pengeluaran_detail_id" class="form-control" value="{{ $data->pengeluaran_detail_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Tanggal Perolehan</label>
                <input type="text" name="tanggal_perolehan" class="form-control" value="{{ $data->tanggal_perolehan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Nilai Perolehan</label>
                <input type="text" name="nilai_perolehan" class="form-control" value="{{ $data->nilai_perolehan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Masa Manfaat Tahun</label>
                <input type="text" name="masa_manfaat_tahun" class="form-control" value="{{ $data->masa_manfaat_tahun }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Metode Penyusutan</label>
                <input type="text" name="metode_penyusutan" class="form-control" value="{{ $data->metode_penyusutan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Akumulasi Penyusutan</label>
                <input type="text" name="akumulasi_penyusutan" class="form-control" value="{{ $data->akumulasi_penyusutan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Nilai Buku</label>
                <input type="text" name="nilai_buku" class="form-control" value="{{ $data->nilai_buku }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Kondisi</label>
                <input type="text" name="kondisi" class="form-control" value="{{ $data->kondisi }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">No Seri</label>
                <input type="text" name="no_seri" class="form-control" value="{{ $data->no_seri }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Spesifikasi</label>
                <input type="text" name="spesifikasi" class="form-control" value="{{ $data->spesifikasi }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Lokasi Detail</label>
                <input type="text" name="lokasi_detail" class="form-control" value="{{ $data->lokasi_detail }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Status</label>
                <input type="text" name="status" class="form-control" value="{{ $data->status }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="{{ $data->keterangan }}" required>
            </div>
            <hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection