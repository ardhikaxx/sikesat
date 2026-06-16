@extends('layouts.app')
@section('title', 'Detail SumberDana - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Detail SumberDana</h1>
        <a href="{{ route('sumber-dana.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-bordered">
            <tr><th width="25%">Id</th><td>{{ $data->id }}</td></tr>
            <tr><th width="25%">Kode</th><td>{{ $data->kode }}</td></tr>
            <tr><th width="25%">Nama</th><td>{{ $data->nama }}</td></tr>
            <tr><th width="25%">Jenis</th><td>{{ $data->jenis }}</td></tr>
            <tr><th width="25%">Tahun Anggaran</th><td>{{ $data->tahun_anggaran }}</td></tr>
            <tr><th width="25%">Total Pagu</th><td>{{ $data->total_pagu }}</td></tr>
            <tr><th width="25%">Keterangan</th><td>{{ $data->keterangan }}</td></tr>
            <tr><th width="25%">Is Aktif</th><td>{{ $data->is_aktif }}</td></tr>
            <tr><th width="25%">Created At</th><td>{{ $data->created_at }}</td></tr>
            <tr><th width="25%">Updated At</th><td>{{ $data->updated_at }}</td></tr>
        </table>
    </div>
</div>
@endsection