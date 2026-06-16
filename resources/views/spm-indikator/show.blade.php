@extends('layouts.app')
@section('title', 'Detail SpmIndikator - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-eye"></i> Detail SpmIndikator</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('spm-indikator.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-striped mb-0">
            <tr><th width="25%">Id</th><td>{{ $data->id }}</td></tr>
            <tr><th width="25%">Jenis Layanan</th><td>{{ $data->jenis_layanan }}</td></tr>
            <tr><th width="25%">Indikator</th><td>{{ $data->indikator }}</td></tr>
            <tr><th width="25%">Standar Persentase</th><td>{{ $data->standar_persentase }}</td></tr>
            <tr><th width="25%">Is Aktif</th><td>{{ $data->is_aktif }}</td></tr>
            <tr><th width="25%">Created At</th><td>{{ $data->created_at }}</td></tr>
            <tr><th width="25%">Updated At</th><td>{{ $data->updated_at }}</td></tr>
        </table>
    </div>
</div>
@endsection