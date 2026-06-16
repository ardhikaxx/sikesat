@extends('layouts.app')
@section('title', 'Detail JaspelPerhitungan - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Detail JaspelPerhitungan</h1>
        <a href="{{ route('jaspel-perhitungan.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-bordered">
            <tr><th width="25%">Id</th><td>{{ $data->id }}</td></tr>
            <tr><th width="25%">Periode Bulan</th><td>{{ $data->periode_bulan }}</td></tr>
            <tr><th width="25%">Periode Tahun</th><td>{{ $data->periode_tahun }}</td></tr>
            <tr><th width="25%">Sumber Dana</th><td>{{ $data->sumber_dana }}</td></tr>
            <tr><th width="25%">Total Dana</th><td>{{ $data->total_dana }}</td></tr>
            <tr><th width="25%">Status</th><td>{{ $data->status }}</td></tr>
            <tr><th width="25%">Created At</th><td>{{ $data->created_at }}</td></tr>
            <tr><th width="25%">Updated At</th><td>{{ $data->updated_at }}</td></tr>
        </table>
    </div>
</div>
@endsection