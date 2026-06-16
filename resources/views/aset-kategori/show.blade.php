@extends('layouts.app')
@section('title', 'Detail AsetKategori - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Detail AsetKategori</h1>
        <a href="{{ route('aset-kategori.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-bordered">
            <tr><th width="25%">Id</th><td>{{ $data->id }}</td></tr>
            <tr><th width="25%">Kode</th><td>{{ $data->kode }}</td></tr>
            <tr><th width="25%">Nama</th><td>{{ $data->nama }}</td></tr>
            <tr><th width="25%">Jenis</th><td>{{ $data->jenis }}</td></tr>
            <tr><th width="25%">Masa Manfaat Tahun</th><td>{{ $data->masa_manfaat_tahun }}</td></tr>
            <tr><th width="25%">Tarif Penyusutan</th><td>{{ $data->tarif_penyusutan }}</td></tr>
            <tr><th width="25%">Akun Perolehan Id</th><td>{{ $data->akun_perolehan_id }}</td></tr>
            <tr><th width="25%">Akun Penyusutan Id</th><td>{{ $data->akun_penyusutan_id }}</td></tr>
            <tr><th width="25%">Akun Akumulasi Id</th><td>{{ $data->akun_akumulasi_id }}</td></tr>
            <tr><th width="25%">Created At</th><td>{{ $data->created_at }}</td></tr>
            <tr><th width="25%">Updated At</th><td>{{ $data->updated_at }}</td></tr>
        </table>
    </div>
</div>
@endsection