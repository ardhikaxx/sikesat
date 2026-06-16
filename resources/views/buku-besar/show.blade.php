@extends('layouts.app')
@section('title', 'Detail BukuBesar - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-eye"></i> Detail BukuBesar</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('buku-besar.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-striped mb-0">
            <tr><th width="25%">Id</th><td>{{ $data->id }}</td></tr>
            <tr><th width="25%">Akun Id</th><td>{{ $data->akun_id }}</td></tr>
            <tr><th width="25%">Jurnal Detail Id</th><td>{{ $data->jurnal_detail_id }}</td></tr>
            <tr><th width="25%">Tanggal</th><td>{{ $data->tanggal }}</td></tr>
            <tr><th width="25%">No Jurnal</th><td>{{ $data->no_jurnal }}</td></tr>
            <tr><th width="25%">Keterangan</th><td>{{ $data->keterangan }}</td></tr>
            <tr><th width="25%">Debit</th><td>{{ $data->debit }}</td></tr>
            <tr><th width="25%">Kredit</th><td>{{ $data->kredit }}</td></tr>
            <tr><th width="25%">Saldo</th><td>{{ $data->saldo }}</td></tr>
            <tr><th width="25%">Created At</th><td>{{ $data->created_at }}</td></tr>
            <tr><th width="25%">Updated At</th><td>{{ $data->updated_at }}</td></tr>
        </table>
    </div>
</div>
@endsection