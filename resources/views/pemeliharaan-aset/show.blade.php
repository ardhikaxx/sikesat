@extends('layouts.app')
@section('title', 'Detail PemeliharaanAset - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-eye"></i> Detail PemeliharaanAset</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('pemeliharaan-aset.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-striped mb-0">
            <tr><th width="25%">Id</th><td>{{ $data->id }}</td></tr>
            <tr><th width="25%">Aset Id</th><td>{{ $data->aset_id }}</td></tr>
            <tr><th width="25%">Tanggal</th><td>{{ $data->tanggal }}</td></tr>
            <tr><th width="25%">Jenis Pemeliharaan</th><td>{{ $data->jenis_pemeliharaan }}</td></tr>
            <tr><th width="25%">Biaya</th><td>{{ $data->biaya }}</td></tr>
            <tr><th width="25%">Pengeluaran Id</th><td>{{ $data->pengeluaran_id }}</td></tr>
            <tr><th width="25%">Kondisi Sebelum</th><td>{{ $data->kondisi_sebelum }}</td></tr>
            <tr><th width="25%">Kondisi Sesudah</th><td>{{ $data->kondisi_sesudah }}</td></tr>
            <tr><th width="25%">Dilakukan Oleh</th><td>{{ $data->dilakukan_oleh }}</td></tr>
            <tr><th width="25%">Keterangan</th><td>{{ $data->keterangan }}</td></tr>
            <tr><th width="25%">Created At</th><td>{{ $data->created_at }}</td></tr>
            <tr><th width="25%">Updated At</th><td>{{ $data->updated_at }}</td></tr>
        </table>
    </div>
</div>
@endsection