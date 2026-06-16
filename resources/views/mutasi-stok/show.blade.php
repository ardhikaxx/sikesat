@extends('layouts.app')
@section('title', 'Detail MutasiStok - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Detail MutasiStok</h1>
        <a href="{{ route('mutasi-stok.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-bordered">
            <tr><th width="25%">Id</th><td>{{ $data->id }}</td></tr>
            <tr><th width="25%">Obat Alkes Id</th><td>{{ $data->obat_alkes_id }}</td></tr>
            <tr><th width="25%">Stok Gudang Id</th><td>{{ $data->stok_gudang_id }}</td></tr>
            <tr><th width="25%">Tanggal</th><td>{{ $data->tanggal }}</td></tr>
            <tr><th width="25%">Jenis</th><td>{{ $data->jenis }}</td></tr>
            <tr><th width="25%">Jumlah</th><td>{{ $data->jumlah }}</td></tr>
            <tr><th width="25%">Saldo Sesudah</th><td>{{ $data->saldo_sesudah }}</td></tr>
            <tr><th width="25%">Sumber</th><td>{{ $data->sumber }}</td></tr>
            <tr><th width="25%">Referensi Id</th><td>{{ $data->referensi_id }}</td></tr>
            <tr><th width="25%">Unit Tujuan Id</th><td>{{ $data->unit_tujuan_id }}</td></tr>
            <tr><th width="25%">Keterangan</th><td>{{ $data->keterangan }}</td></tr>
            <tr><th width="25%">Input Oleh</th><td>{{ $data->input_oleh }}</td></tr>
            <tr><th width="25%">Created At</th><td>{{ $data->created_at }}</td></tr>
            <tr><th width="25%">Updated At</th><td>{{ $data->updated_at }}</td></tr>
        </table>
    </div>
</div>
@endsection