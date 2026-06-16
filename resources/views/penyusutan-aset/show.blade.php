@extends('layouts.app')
@section('title', 'Detail PenyusutanAset - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-eye"></i> Detail PenyusutanAset</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('penyusutan-aset.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-striped mb-0">
            <tr><th width="25%">Id</th><td>{{ $data->id }}</td></tr>
            <tr><th width="25%">Aset Id</th><td>{{ $data->aset_id }}</td></tr>
            <tr><th width="25%">Periode Bulan</th><td>{{ $data->periode_bulan }}</td></tr>
            <tr><th width="25%">Periode Tahun</th><td>{{ $data->periode_tahun }}</td></tr>
            <tr><th width="25%">Nilai Penyusutan</th><td>{{ $data->nilai_penyusutan }}</td></tr>
            <tr><th width="25%">Akumulasi Penyusutan</th><td>{{ $data->akumulasi_penyusutan }}</td></tr>
            <tr><th width="25%">Nilai Buku Sesudah</th><td>{{ $data->nilai_buku_sesudah }}</td></tr>
            <tr><th width="25%">Jurnal Id</th><td>{{ $data->jurnal_id }}</td></tr>
            <tr><th width="25%">Created At</th><td>{{ $data->created_at }}</td></tr>
            <tr><th width="25%">Updated At</th><td>{{ $data->updated_at }}</td></tr>
        </table>
    </div>
</div>
@endsection