@extends('layouts.app')
@section('title', 'Detail PengeluaranKasDetail - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">Detail PengeluaranKasDetail</h1>
        <a href="{{ route('pengeluaran-kas-detail.index') }}" class="text-decoration-none">&larr; Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-bordered">
            <tr><th width="25%">Id</th><td>{{ $data->id }}</td></tr>
            <tr><th width="25%">Pengeluaran Id</th><td>{{ $data->pengeluaran_id }}</td></tr>
            <tr><th width="25%">Akun Id</th><td>{{ $data->akun_id }}</td></tr>
            <tr><th width="25%">Nama Item</th><td>{{ $data->nama_item }}</td></tr>
            <tr><th width="25%">Satuan</th><td>{{ $data->satuan }}</td></tr>
            <tr><th width="25%">Jumlah Qty</th><td>{{ $data->jumlah_qty }}</td></tr>
            <tr><th width="25%">Harga Satuan</th><td>{{ $data->harga_satuan }}</td></tr>
            <tr><th width="25%">Subtotal</th><td>{{ $data->subtotal }}</td></tr>
            <tr><th width="25%">Keterangan</th><td>{{ $data->keterangan }}</td></tr>
            <tr><th width="25%">Created At</th><td>{{ $data->created_at }}</td></tr>
            <tr><th width="25%">Updated At</th><td>{{ $data->updated_at }}</td></tr>
        </table>
    </div>
</div>
@endsection