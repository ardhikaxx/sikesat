@extends('layouts.app')
@section('title', 'Detail JurnalPenyesuaian - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-eye"></i> Detail JurnalPenyesuaian</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('jurnal-penyesuaian.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-striped mb-0">
            <tr><th width="25%">Id</th><td>{{ $data->id }}</td></tr>
            <tr><th width="25%">Tahun Anggaran Id</th><td>{{ $data->tahun_anggaran_id }}</td></tr>
            <tr><th width="25%">Tanggal</th><td>{{ $data->tanggal }}</td></tr>
            <tr><th width="25%">Jenis</th><td>{{ $data->jenis }}</td></tr>
            <tr><th width="25%">Keterangan</th><td>{{ $data->keterangan }}</td></tr>
            <tr><th width="25%">Status</th><td>{{ $data->status }}</td></tr>
            <tr><th width="25%">Disetujui Oleh</th><td>{{ $data->disetujui_oleh }}</td></tr>
            <tr><th width="25%">Created At</th><td>{{ $data->created_at }}</td></tr>
            <tr><th width="25%">Updated At</th><td>{{ $data->updated_at }}</td></tr>
        </table>
    </div>
</div>
@endsection