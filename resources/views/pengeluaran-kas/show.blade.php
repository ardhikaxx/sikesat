@extends('layouts.app')
@section('title', 'Detail PengeluaranKas - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-eye"></i> Detail PengeluaranKas</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('pengeluaran-kas.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-striped mb-0">
            <tr><th width="25%">Id</th><td>{{ $data->id }}</td></tr>
            <tr><th width="25%">No Bukti</th><td>{{ $data->no_bukti }}</td></tr>
            <tr><th width="25%">Tanggal</th><td>{{ $data->tanggal }}</td></tr>
            <tr><th width="25%">Pengajuan Id</th><td>{{ $data->pengajuan_id }}</td></tr>
            <tr><th width="25%">Supplier Id</th><td>{{ $data->supplier_id }}</td></tr>
            <tr><th width="25%">Jenis Pengeluaran</th><td>{{ $data->jenis_pengeluaran }}</td></tr>
            <tr><th width="25%">Sumber Dana Id</th><td>{{ $data->sumber_dana_id }}</td></tr>
            <tr><th width="25%">Rka Id</th><td>{{ $data->rka_id }}</td></tr>
            <tr><th width="25%">No Spd</th><td>{{ $data->no_spd }}</td></tr>
            <tr><th width="25%">No Spm</th><td>{{ $data->no_spm }}</td></tr>
            <tr><th width="25%">No Sp2d</th><td>{{ $data->no_sp2d }}</td></tr>
            <tr><th width="25%">Metode Pembayaran</th><td>{{ $data->metode_pembayaran }}</td></tr>
            <tr><th width="25%">No Referensi</th><td>{{ $data->no_referensi }}</td></tr>
            <tr><th width="25%">Jumlah Bruto</th><td>{{ $data->jumlah_bruto }}</td></tr>
            <tr><th width="25%">Pajak Ppn</th><td>{{ $data->pajak_ppn }}</td></tr>
            <tr><th width="25%">Pajak Pph</th><td>{{ $data->pajak_pph }}</td></tr>
            <tr><th width="25%">Jumlah Neto</th><td>{{ $data->jumlah_neto }}</td></tr>
            <tr><th width="25%">Keterangan</th><td>{{ $data->keterangan }}</td></tr>
            <tr><th width="25%">No Faktur</th><td>{{ $data->no_faktur }}</td></tr>
            <tr><th width="25%">Tanggal Faktur</th><td>{{ $data->tanggal_faktur }}</td></tr>
            <tr><th width="25%">Status</th><td>{{ $data->status }}</td></tr>
            <tr><th width="25%">Status Jurnal</th><td>{{ $data->status_jurnal }}</td></tr>
            <tr><th width="25%">Input Oleh</th><td>{{ $data->input_oleh }}</td></tr>
            <tr><th width="25%">Diverifikasi Oleh</th><td>{{ $data->diverifikasi_oleh }}</td></tr>
            <tr><th width="25%">Diverifikasi At</th><td>{{ $data->diverifikasi_at }}</td></tr>
            <tr><th width="25%">Disetujui Oleh</th><td>{{ $data->disetujui_oleh }}</td></tr>
            <tr><th width="25%">Disetujui At</th><td>{{ $data->disetujui_at }}</td></tr>
            <tr><th width="25%">Dibayar Oleh</th><td>{{ $data->dibayar_oleh }}</td></tr>
            <tr><th width="25%">Dibayar At</th><td>{{ $data->dibayar_at }}</td></tr>
            <tr><th width="25%">Void Oleh</th><td>{{ $data->void_oleh }}</td></tr>
            <tr><th width="25%">Void At</th><td>{{ $data->void_at }}</td></tr>
            <tr><th width="25%">Alasan Void</th><td>{{ $data->alasan_void }}</td></tr>
            <tr><th width="25%">Created At</th><td>{{ $data->created_at }}</td></tr>
            <tr><th width="25%">Updated At</th><td>{{ $data->updated_at }}</td></tr>
        </table>
    </div>
</div>
@endsection