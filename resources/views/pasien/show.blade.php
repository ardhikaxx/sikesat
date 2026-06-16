@extends('layouts.app')
@section('title', 'Detail Pasien - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-eye"></i> Detail Pasien</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('pasien.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-striped mb-0">
            <tr><th width="25%">Id</th><td>{{ $data->id }}</td></tr>
            <tr><th width="25%">No Rm</th><td>{{ $data->no_rm }}</td></tr>
            <tr><th width="25%">Nik</th><td>{{ $data->nik }}</td></tr>
            <tr><th width="25%">Nama</th><td>{{ $data->nama }}</td></tr>
            <tr><th width="25%">Jenis Kelamin</th><td>{{ $data->jenis_kelamin }}</td></tr>
            <tr><th width="25%">Tanggal Lahir</th><td>{{ $data->tanggal_lahir }}</td></tr>
            <tr><th width="25%">Alamat</th><td>{{ $data->alamat }}</td></tr>
            <tr><th width="25%">No Telepon</th><td>{{ $data->no_telepon }}</td></tr>
            <tr><th width="25%">Jenis Pasien</th><td>{{ $data->jenis_pasien }}</td></tr>
            <tr><th width="25%">No Bpjs</th><td>{{ $data->no_bpjs }}</td></tr>
            <tr><th width="25%">Faskes Tingkat Satu</th><td>{{ $data->faskes_tingkat_satu }}</td></tr>
            <tr><th width="25%">Created At</th><td>{{ $data->created_at }}</td></tr>
            <tr><th width="25%">Updated At</th><td>{{ $data->updated_at }}</td></tr>
        </table>
    </div>
</div>
@endsection