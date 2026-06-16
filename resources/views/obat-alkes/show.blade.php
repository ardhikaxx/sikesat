@extends('layouts.app')
@section('title', 'Detail ObatAlkes - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-eye"></i> Detail ObatAlkes</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('obat-alkes.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-striped mb-0">
            <tr><th width="25%">Id</th><td>{{ $data->id }}</td></tr>
            <tr><th width="25%">Kode Barang</th><td>{{ $data->kode_barang }}</td></tr>
            <tr><th width="25%">Nama Generik</th><td>{{ $data->nama_generik }}</td></tr>
            <tr><th width="25%">Nama Dagang</th><td>{{ $data->nama_dagang }}</td></tr>
            <tr><th width="25%">Kategori Id</th><td>{{ $data->kategori_id }}</td></tr>
            <tr><th width="25%">Satuan</th><td>{{ $data->satuan }}</td></tr>
            <tr><th width="25%">Satuan Terkecil</th><td>{{ $data->satuan_terkecil }}</td></tr>
            <tr><th width="25%">Konversi</th><td>{{ $data->konversi }}</td></tr>
            <tr><th width="25%">Akun Persediaan Id</th><td>{{ $data->akun_persediaan_id }}</td></tr>
            <tr><th width="25%">Stok Minimum</th><td>{{ $data->stok_minimum }}</td></tr>
            <tr><th width="25%">Stok Maksimum</th><td>{{ $data->stok_maksimum }}</td></tr>
            <tr><th width="25%">Lokasi Penyimpanan</th><td>{{ $data->lokasi_penyimpanan }}</td></tr>
            <tr><th width="25%">Suhu Penyimpanan</th><td>{{ $data->suhu_penyimpanan }}</td></tr>
            <tr><th width="25%">Golongan</th><td>{{ $data->golongan }}</td></tr>
            <tr><th width="25%">Is Aktif</th><td>{{ $data->is_aktif }}</td></tr>
            <tr><th width="25%">Created At</th><td>{{ $data->created_at }}</td></tr>
            <tr><th width="25%">Updated At</th><td>{{ $data->updated_at }}</td></tr>
        </table>
    </div>
</div>
@endsection