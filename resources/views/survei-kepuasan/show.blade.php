@extends('layouts.app')
@section('title', 'Detail SurveiKepuasan - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-eye"></i> Detail SurveiKepuasan</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('survei-kepuasan.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-striped mb-0">
            <tr><th width="25%">Id</th><td>{{ $data->id }}</td></tr>
            <tr><th width="25%">Unit Id</th><td>{{ $data->unit_id }}</td></tr>
            <tr><th width="25%">Periode Bulan</th><td>{{ $data->periode_bulan }}</td></tr>
            <tr><th width="25%">Periode Tahun</th><td>{{ $data->periode_tahun }}</td></tr>
            <tr><th width="25%">Jumlah Responden</th><td>{{ $data->jumlah_responden }}</td></tr>
            <tr><th width="25%">Skor Rata Rata</th><td>{{ $data->skor_rata_rata }}</td></tr>
            <tr><th width="25%">Persentase Puas</th><td>{{ $data->persentase_puas }}</td></tr>
            <tr><th width="25%">Keterangan</th><td>{{ $data->keterangan }}</td></tr>
            <tr><th width="25%">Input Oleh</th><td>{{ $data->input_oleh }}</td></tr>
            <tr><th width="25%">Created At</th><td>{{ $data->created_at }}</td></tr>
            <tr><th width="25%">Updated At</th><td>{{ $data->updated_at }}</td></tr>
        </table>
    </div>
</div>
@endsection