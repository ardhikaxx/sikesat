@extends('layouts.app')
@section('title', 'Detail RealisasiIndikatorMutu - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Detail RealisasiIndikatorMutu</h1>
        <a href="{{ route('realisasi-indikator-mutu.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-bordered">
            <tr><th width="25%">Id</th><td>{{ $data->id }}</td></tr>
            <tr><th width="25%">Indikator Id</th><td>{{ $data->indikator_id }}</td></tr>
            <tr><th width="25%">Unit Id</th><td>{{ $data->unit_id }}</td></tr>
            <tr><th width="25%">Periode Bulan</th><td>{{ $data->periode_bulan }}</td></tr>
            <tr><th width="25%">Periode Tahun</th><td>{{ $data->periode_tahun }}</td></tr>
            <tr><th width="25%">Nilai Realisasi</th><td>{{ $data->nilai_realisasi }}</td></tr>
            <tr><th width="25%">Nilai Target</th><td>{{ $data->nilai_target }}</td></tr>
            <tr><th width="25%">Keterangan</th><td>{{ $data->keterangan }}</td></tr>
            <tr><th width="25%">Input Oleh</th><td>{{ $data->input_oleh }}</td></tr>
            <tr><th width="25%">Created At</th><td>{{ $data->created_at }}</td></tr>
            <tr><th width="25%">Updated At</th><td>{{ $data->updated_at }}</td></tr>
        </table>
    </div>
</div>
@endsection