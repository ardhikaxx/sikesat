@extends('layouts.app')
@section('title', 'Detail Pegawai - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-eye"></i> Detail Pegawai</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-striped mb-0">
            <tr><th width="25%">Id</th><td>{{ $data->id }}</td></tr>
            <tr><th width="25%">User Id</th><td>{{ $data->user_id }}</td></tr>
            <tr><th width="25%">Nip</th><td>{{ $data->nip }}</td></tr>
            <tr><th width="25%">Nama</th><td>{{ $data->nama }}</td></tr>
            <tr><th width="25%">Jenis Kelamin</th><td>{{ $data->jenis_kelamin }}</td></tr>
            <tr><th width="25%">Tempat Lahir</th><td>{{ $data->tempat_lahir }}</td></tr>
            <tr><th width="25%">Tanggal Lahir</th><td>{{ $data->tanggal_lahir }}</td></tr>
            <tr><th width="25%">Alamat</th><td>{{ $data->alamat }}</td></tr>
            <tr><th width="25%">No Telepon</th><td>{{ $data->no_telepon }}</td></tr>
            <tr><th width="25%">Jabatan</th><td>{{ $data->jabatan }}</td></tr>
            <tr><th width="25%">Golongan</th><td>{{ $data->golongan }}</td></tr>
            <tr><th width="25%">Jenis Pegawai</th><td>{{ $data->jenis_pegawai }}</td></tr>
            <tr><th width="25%">Unit Id</th><td>{{ $data->unit_id }}</td></tr>
            <tr><th width="25%">Tanggal Masuk</th><td>{{ $data->tanggal_masuk }}</td></tr>
            <tr><th width="25%">Status Aktif</th><td>{{ $data->status_aktif }}</td></tr>
            <tr><th width="25%">Created At</th><td>{{ $data->created_at }}</td></tr>
            <tr><th width="25%">Updated At</th><td>{{ $data->updated_at }}</td></tr>
            <tr><th width="25%">Deleted At</th><td>{{ $data->deleted_at }}</td></tr>
        </table>
    </div>
</div>
@endsection