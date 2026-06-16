@extends('layouts.app')
@section('title', 'Detail NeracaSaldo - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Detail NeracaSaldo</h1>
        <a href="{{ route('neraca-saldo.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-bordered">
            <tr><th width="25%">Id</th><td>{{ $data->id }}</td></tr>
            <tr><th width="25%">Periode Bulan</th><td>{{ $data->periode_bulan }}</td></tr>
            <tr><th width="25%">Periode Tahun</th><td>{{ $data->periode_tahun }}</td></tr>
            <tr><th width="25%">Akun Id</th><td>{{ $data->akun_id }}</td></tr>
            <tr><th width="25%">Saldo Awal Debit</th><td>{{ $data->saldo_awal_debit }}</td></tr>
            <tr><th width="25%">Saldo Awal Kredit</th><td>{{ $data->saldo_awal_kredit }}</td></tr>
            <tr><th width="25%">Mutasi Debit</th><td>{{ $data->mutasi_debit }}</td></tr>
            <tr><th width="25%">Mutasi Kredit</th><td>{{ $data->mutasi_kredit }}</td></tr>
            <tr><th width="25%">Saldo Akhir Debit</th><td>{{ $data->saldo_akhir_debit }}</td></tr>
            <tr><th width="25%">Saldo Akhir Kredit</th><td>{{ $data->saldo_akhir_kredit }}</td></tr>
            <tr><th width="25%">Created At</th><td>{{ $data->created_at }}</td></tr>
            <tr><th width="25%">Updated At</th><td>{{ $data->updated_at }}</td></tr>
        </table>
    </div>
</div>
@endsection