@extends('layouts.app')
@section('title', 'Detail AkunAkuntansi - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-eye"></i> Detail AkunAkuntansi</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('akun-akuntansi.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-striped mb-0">
            <tr><th width="25%">Id</th><td>{{ $data->id }}</td></tr>
            <tr><th width="25%">Kode Akun</th><td>{{ $data->kode_akun }}</td></tr>
            <tr><th width="25%">Nama Akun</th><td>{{ $data->nama_akun }}</td></tr>
            <tr><th width="25%">Jenis Akun</th><td>{{ $data->jenis_akun }}</td></tr>
            <tr><th width="25%">Kelompok Akun</th><td>{{ $data->kelompok_akun }}</td></tr>
            <tr><th width="25%">Akun Induk Id</th><td>{{ $data->akun_induk_id }}</td></tr>
            <tr><th width="25%">Level</th><td>{{ $data->level }}</td></tr>
            <tr><th width="25%">Saldo Normal</th><td>{{ $data->saldo_normal }}</td></tr>
            <tr><th width="25%">Is Aktif</th><td>{{ $data->is_aktif }}</td></tr>
            <tr><th width="25%">Keterangan</th><td>{{ $data->keterangan }}</td></tr>
            <tr><th width="25%">Created At</th><td>{{ $data->created_at }}</td></tr>
            <tr><th width="25%">Updated At</th><td>{{ $data->updated_at }}</td></tr>
        </table>
    </div>
</div>
@endsection