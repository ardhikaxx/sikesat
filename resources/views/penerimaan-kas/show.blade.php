@extends('layouts.app')
@section('title', 'Detail PenerimaanKas - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-eye"></i> Detail PenerimaanKas</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('penerimaan-kas.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-striped mb-0">
            <tr><th width="25%">Id</th><td>{{ $data->id }}</td></tr>
            <tr><th width="25%">No Bukti</th><td>{{ $data->no_bukti }}</td></tr>
            <tr><th width="25%">Tanggal</th><td>{{ $data->tanggal }}</td></tr>
            <tr><th width="25%">Jenis Penerimaan</th><td>{{ $data->jenis_penerimaan }}</td></tr>
            <tr><th width="25%">Sumber Dana Id</th><td>{{ $data->sumber_dana_id }}</td></tr>
            <tr><th width="25%">Unit Id</th><td>{{ $data->unit_id }}</td></tr>
            <tr><th width="25%">Pasien Id</th><td>{{ $data->pasien_id }}</td></tr>
            <tr><th width="25%">Jumlah</th><td>{{ $data->jumlah }}</td></tr>
            <tr><th width="25%">Metode Pembayaran</th><td>{{ $data->metode_pembayaran }}</td></tr>
            <tr><th width="25%">No Referensi</th><td>{{ $data->no_referensi }}</td></tr>
            <tr><th width="25%">Keterangan</th><td>{{ $data->keterangan }}</td></tr>
            <tr><th width="25%">Status</th><td>{{ $data->status }}</td></tr>
            <tr><th width="25%">Status Jurnal</th><td>{{ $data->status_jurnal }}</td></tr>
            <tr><th width="25%">Input Oleh</th><td>{{ $data->input_oleh }}</td></tr>
            <tr><th width="25%">Diverifikasi Oleh</th><td>{{ $data->diverifikasi_oleh }}</td></tr>
            <tr><th width="25%">Diverifikasi At</th><td>{{ $data->diverifikasi_at }}</td></tr>
            <tr><th width="25%">Void Oleh</th><td>{{ $data->void_oleh }}</td></tr>
            <tr><th width="25%">Void At</th><td>{{ $data->void_at }}</td></tr>
            <tr><th width="25%">Alasan Void</th><td>{{ $data->alasan_void }}</td></tr>
            <tr><th width="25%">Created At</th><td>{{ $data->created_at }}</td></tr>
            <tr><th width="25%">Updated At</th><td>{{ $data->updated_at }}</td></tr>
        </table>
    </div>
</div>
@endsection