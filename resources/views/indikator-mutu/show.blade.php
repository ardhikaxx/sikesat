@extends('layouts.app')
@section('title', 'Detail IndikatorMutu - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-eye"></i> Detail IndikatorMutu</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('indikator-mutu.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-striped mb-0">
            <tr><th width="25%">Id</th><td>{{ $data->id }}</td></tr>
            <tr><th width="25%">Kode</th><td>{{ $data->kode }}</td></tr>
            <tr><th width="25%">Nama</th><td>{{ $data->nama }}</td></tr>
            <tr><th width="25%">Satuan</th><td>{{ $data->satuan }}</td></tr>
            <tr><th width="25%">Jenis</th><td>{{ $data->jenis }}</td></tr>
            <tr><th width="25%">Target Nilai</th><td>{{ $data->target_nilai }}</td></tr>
            <tr><th width="25%">Arah Target</th><td>{{ $data->arah_target }}</td></tr>
            <tr><th width="25%">Unit Id</th><td>{{ $data->unit_id }}</td></tr>
            <tr><th width="25%">Is Aktif</th><td>{{ $data->is_aktif }}</td></tr>
            <tr><th width="25%">Keterangan</th><td>{{ $data->keterangan }}</td></tr>
            <tr><th width="25%">Created At</th><td>{{ $data->created_at }}</td></tr>
            <tr><th width="25%">Updated At</th><td>{{ $data->updated_at }}</td></tr>
        </table>
    </div>
</div>
@endsection