@extends('layouts.app')
@section('title', 'Detail PengajuanPengadaan - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Detail PengajuanPengadaan</h1>
        <a href="{{ route('pengajuan-pengadaan.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-bordered">
            <tr><th width="25%">Id</th><td>{{ $data->id }}</td></tr>
            <tr><th width="25%">No Pengajuan</th><td>{{ $data->no_pengajuan }}</td></tr>
            <tr><th width="25%">Tanggal Pengajuan</th><td>{{ $data->tanggal_pengajuan }}</td></tr>
            <tr><th width="25%">Unit Id</th><td>{{ $data->unit_id }}</td></tr>
            <tr><th width="25%">Rka Id</th><td>{{ $data->rka_id }}</td></tr>
            <tr><th width="25%">Jenis Pengadaan</th><td>{{ $data->jenis_pengadaan }}</td></tr>
            <tr><th width="25%">Prioritas</th><td>{{ $data->prioritas }}</td></tr>
            <tr><th width="25%">Deskripsi</th><td>{{ $data->deskripsi }}</td></tr>
            <tr><th width="25%">Total Estimasi</th><td>{{ $data->total_estimasi }}</td></tr>
            <tr><th width="25%">Status</th><td>{{ $data->status }}</td></tr>
            <tr><th width="25%">Diajukan Oleh</th><td>{{ $data->diajukan_oleh }}</td></tr>
            <tr><th width="25%">Diverifikasi Oleh</th><td>{{ $data->diverifikasi_oleh }}</td></tr>
            <tr><th width="25%">Diverifikasi At</th><td>{{ $data->diverifikasi_at }}</td></tr>
            <tr><th width="25%">Disetujui Oleh</th><td>{{ $data->disetujui_oleh }}</td></tr>
            <tr><th width="25%">Disetujui At</th><td>{{ $data->disetujui_at }}</td></tr>
            <tr><th width="25%">Catatan</th><td>{{ $data->catatan }}</td></tr>
            <tr><th width="25%">Created At</th><td>{{ $data->created_at }}</td></tr>
            <tr><th width="25%">Updated At</th><td>{{ $data->updated_at }}</td></tr>
        </table>
    </div>
</div>
@endsection