@extends('layouts.app')
@section('title', 'Detail JurnalUmum - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Detail JurnalUmum</h1>
        <a href="{{ route('jurnal-umum.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-bordered">
            <tr><th width="25%">Id</th><td>{{ $data->id }}</td></tr>
            <tr><th width="25%">No Jurnal</th><td>{{ $data->no_jurnal }}</td></tr>
            <tr><th width="25%">Tanggal</th><td>{{ $data->tanggal }}</td></tr>
            <tr><th width="25%">Jenis Jurnal</th><td>{{ $data->jenis_jurnal }}</td></tr>
            <tr><th width="25%">Sumber</th><td>{{ $data->sumber }}</td></tr>
            <tr><th width="25%">Referensi Id</th><td>{{ $data->referensi_id }}</td></tr>
            <tr><th width="25%">Referensi Tipe</th><td>{{ $data->referensi_tipe }}</td></tr>
            <tr><th width="25%">No Bukti Sumber</th><td>{{ $data->no_bukti_sumber }}</td></tr>
            <tr><th width="25%">Keterangan</th><td>{{ $data->keterangan }}</td></tr>
            <tr><th width="25%">Total Debit</th><td>{{ $data->total_debit }}</td></tr>
            <tr><th width="25%">Total Kredit</th><td>{{ $data->total_kredit }}</td></tr>
            <tr><th width="25%">Status</th><td>{{ $data->status }}</td></tr>
            <tr><th width="25%">Dibuat Oleh</th><td>{{ $data->dibuat_oleh }}</td></tr>
            <tr><th width="25%">Diposting Oleh</th><td>{{ $data->diposting_oleh }}</td></tr>
            <tr><th width="25%">Diposting At</th><td>{{ $data->diposting_at }}</td></tr>
            <tr><th width="25%">Void Oleh</th><td>{{ $data->void_oleh }}</td></tr>
            <tr><th width="25%">Void At</th><td>{{ $data->void_at }}</td></tr>
            <tr><th width="25%">Created At</th><td>{{ $data->created_at }}</td></tr>
            <tr><th width="25%">Updated At</th><td>{{ $data->updated_at }}</td></tr>
        </table>
    </div>
</div>
@endsection