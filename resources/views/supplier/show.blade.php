@extends('layouts.app')
@section('title', 'Detail Supplier - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Detail Supplier</h1>
        <a href="{{ route('supplier.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-bordered">
            <tr><th width="25%">Id</th><td>{{ $data->id }}</td></tr>
            <tr><th width="25%">Kode</th><td>{{ $data->kode }}</td></tr>
            <tr><th width="25%">Nama</th><td>{{ $data->nama }}</td></tr>
            <tr><th width="25%">Jenis</th><td>{{ $data->jenis }}</td></tr>
            <tr><th width="25%">Alamat</th><td>{{ $data->alamat }}</td></tr>
            <tr><th width="25%">No Telepon</th><td>{{ $data->no_telepon }}</td></tr>
            <tr><th width="25%">Email</th><td>{{ $data->email }}</td></tr>
            <tr><th width="25%">NPWP</th><td>{{ $data->NPWP }}</td></tr>
            <tr><th width="25%">Nama Rekening</th><td>{{ $data->nama_rekening }}</td></tr>
            <tr><th width="25%">No Rekening</th><td>{{ $data->no_rekening }}</td></tr>
            <tr><th width="25%">Nama Bank</th><td>{{ $data->nama_bank }}</td></tr>
            <tr><th width="25%">Is Aktif</th><td>{{ $data->is_aktif }}</td></tr>
            <tr><th width="25%">Created At</th><td>{{ $data->created_at }}</td></tr>
            <tr><th width="25%">Updated At</th><td>{{ $data->updated_at }}</td></tr>
            <tr><th width="25%">Deleted At</th><td>{{ $data->deleted_at }}</td></tr>
        </table>
    </div>
</div>
@endsection