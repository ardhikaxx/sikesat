@extends('layouts.app')
@section('title', 'Detail JaspelDetail - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Detail JaspelDetail</h1>
        <a href="{{ route('jaspel-detail.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-bordered">
            <tr><th width="25%">Id</th><td>{{ $data->id }}</td></tr>
            <tr><th width="25%">Jaspel Perhitungan Id</th><td>{{ $data->jaspel_perhitungan_id }}</td></tr>
            <tr><th width="25%">Pegawai Id</th><td>{{ $data->pegawai_id }}</td></tr>
            <tr><th width="25%">Skor Total</th><td>{{ $data->skor_total }}</td></tr>
            <tr><th width="25%">Nominal Diterima</th><td>{{ $data->nominal_diterima }}</td></tr>
            <tr><th width="25%">Created At</th><td>{{ $data->created_at }}</td></tr>
            <tr><th width="25%">Updated At</th><td>{{ $data->updated_at }}</td></tr>
        </table>
    </div>
</div>
@endsection