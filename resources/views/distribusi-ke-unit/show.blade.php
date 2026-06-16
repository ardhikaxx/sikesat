@extends('layouts.app')
@section('title', 'Detail DistribusiKeUnit - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Detail DistribusiKeUnit</h1>
        <a href="{{ route('distribusi-ke-unit.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-bordered">
            <tr><th width="25%">Id</th><td>{{ $data->id }}</td></tr>
            <tr><th width="25%">No Distribusi</th><td>{{ $data->no_distribusi }}</td></tr>
            <tr><th width="25%">Tanggal</th><td>{{ $data->tanggal }}</td></tr>
            <tr><th width="25%">Unit Tujuan Id</th><td>{{ $data->unit_tujuan_id }}</td></tr>
            <tr><th width="25%">Status</th><td>{{ $data->status }}</td></tr>
            <tr><th width="25%">Dikirim Oleh</th><td>{{ $data->dikirim_oleh }}</td></tr>
            <tr><th width="25%">Diterima Oleh</th><td>{{ $data->diterima_oleh }}</td></tr>
            <tr><th width="25%">Catatan</th><td>{{ $data->catatan }}</td></tr>
            <tr><th width="25%">Created At</th><td>{{ $data->created_at }}</td></tr>
            <tr><th width="25%">Updated At</th><td>{{ $data->updated_at }}</td></tr>
        </table>
    </div>
</div>
@endsection