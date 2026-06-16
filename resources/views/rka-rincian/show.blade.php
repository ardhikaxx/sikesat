@extends('layouts.app')
@section('title', 'Detail RkaRincian - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-eye"></i> Detail RkaRincian</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('rka-rincian.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-striped mb-0">
            <tr><th width="25%">Id</th><td>{{ $data->id }}</td></tr>
            <tr><th width="25%">Rka Id</th><td>{{ $data->rka_id }}</td></tr>
            <tr><th width="25%">Akun Id</th><td>{{ $data->akun_id }}</td></tr>
            <tr><th width="25%">Uraian</th><td>{{ $data->uraian }}</td></tr>
            <tr><th width="25%">Volume</th><td>{{ $data->volume }}</td></tr>
            <tr><th width="25%">Satuan</th><td>{{ $data->satuan }}</td></tr>
            <tr><th width="25%">Harga Satuan</th><td>{{ $data->harga_satuan }}</td></tr>
            <tr><th width="25%">Total</th><td>{{ $data->total }}</td></tr>
            <tr><th width="25%">Created At</th><td>{{ $data->created_at }}</td></tr>
            <tr><th width="25%">Updated At</th><td>{{ $data->updated_at }}</td></tr>
        </table>
    </div>
</div>
@endsection