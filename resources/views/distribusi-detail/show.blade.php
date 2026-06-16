@extends('layouts.app')
@section('title', 'Detail DistribusiDetail - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Detail DistribusiDetail</h1>
        <a href="{{ route('distribusi-detail.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-bordered">
            <tr><th width="25%">Id</th><td>{{ $data->id }}</td></tr>
            <tr><th width="25%">Distribusi Id</th><td>{{ $data->distribusi_id }}</td></tr>
            <tr><th width="25%">Obat Alkes Id</th><td>{{ $data->obat_alkes_id }}</td></tr>
            <tr><th width="25%">Stok Gudang Id</th><td>{{ $data->stok_gudang_id }}</td></tr>
            <tr><th width="25%">Jumlah</th><td>{{ $data->jumlah }}</td></tr>
            <tr><th width="25%">Satuan</th><td>{{ $data->satuan }}</td></tr>
            <tr><th width="25%">Created At</th><td>{{ $data->created_at }}</td></tr>
            <tr><th width="25%">Updated At</th><td>{{ $data->updated_at }}</td></tr>
        </table>
    </div>
</div>
@endsection