@extends('layouts.app')
@section('title', 'Detail Aset - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-eye"></i> Detail Aset</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('aset.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-striped mb-0">
            <tr><th width="25%">Id</th><td>{{ $data->id }}</td></tr>
            <tr><th width="25%">Kode Aset</th><td>{{ $data->kode_aset }}</td></tr>
            <tr><th width="25%">Nama Aset</th><td>{{ $data->nama_aset }}</td></tr>
            <tr><th width="25%">Kategori Id</th><td>{{ $data->kategori_id }}</td></tr>
            <tr><th width="25%">Unit Id</th><td>{{ $data->unit_id }}</td></tr>
            <tr><th width="25%">Pengeluaran Detail Id</th><td>{{ $data->pengeluaran_detail_id }}</td></tr>
            <tr><th width="25%">Tanggal Perolehan</th><td>{{ $data->tanggal_perolehan }}</td></tr>
            <tr><th width="25%">Nilai Perolehan</th><td>{{ $data->nilai_perolehan }}</td></tr>
            <tr><th width="25%">Masa Manfaat Tahun</th><td>{{ $data->masa_manfaat_tahun }}</td></tr>
            <tr><th width="25%">Metode Penyusutan</th><td>{{ $data->metode_penyusutan }}</td></tr>
            <tr><th width="25%">Akumulasi Penyusutan</th><td>{{ $data->akumulasi_penyusutan }}</td></tr>
            <tr><th width="25%">Nilai Buku</th><td>{{ $data->nilai_buku }}</td></tr>
            <tr><th width="25%">Kondisi</th><td>{{ $data->kondisi }}</td></tr>
            <tr><th width="25%">No Seri</th><td>{{ $data->no_seri }}</td></tr>
            <tr><th width="25%">Spesifikasi</th><td>{{ $data->spesifikasi }}</td></tr>
            <tr><th width="25%">Lokasi Detail</th><td>{{ $data->lokasi_detail }}</td></tr>
            <tr><th width="25%">Status</th><td>{{ $data->status }}</td></tr>
            <tr><th width="25%">Keterangan</th><td>{{ $data->keterangan }}</td></tr>
            <tr><th width="25%">Created At</th><td>{{ $data->created_at }}</td></tr>
            <tr><th width="25%">Updated At</th><td>{{ $data->updated_at }}</td></tr>
            <tr><th width="25%">Deleted At</th><td>{{ $data->deleted_at }}</td></tr>
        </table>
    </div>
</div>
@endsection