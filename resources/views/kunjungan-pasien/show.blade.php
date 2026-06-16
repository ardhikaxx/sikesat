@extends('layouts.app')
@section('title', 'Detail KunjunganPasien - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-eye"></i> Detail KunjunganPasien</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('kunjungan-pasien.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-striped mb-0">
            <tr><th width="25%">Id</th><td>{{ $data->id }}</td></tr>
            <tr><th width="25%">Unit Id</th><td>{{ $data->unit_id }}</td></tr>
            <tr><th width="25%">Tanggal</th><td>{{ $data->tanggal }}</td></tr>
            <tr><th width="25%">Jumlah Kunjungan Umum</th><td>{{ $data->jumlah_kunjungan_umum }}</td></tr>
            <tr><th width="25%">Jumlah Kunjungan Bpjs</th><td>{{ $data->jumlah_kunjungan_bpjs }}</td></tr>
            <tr><th width="25%">Jumlah Kunjungan Gratis</th><td>{{ $data->jumlah_kunjungan_gratis }}</td></tr>
            <tr><th width="25%">Total Kunjungan</th><td>{{ $data->total_kunjungan }}</td></tr>
            <tr><th width="25%">Rata Waktu Tunggu</th><td>{{ $data->rata_waktu_tunggu }}</td></tr>
            <tr><th width="25%">Input Oleh</th><td>{{ $data->input_oleh }}</td></tr>
            <tr><th width="25%">Created At</th><td>{{ $data->created_at }}</td></tr>
            <tr><th width="25%">Updated At</th><td>{{ $data->updated_at }}</td></tr>
        </table>
    </div>
</div>
@endsection