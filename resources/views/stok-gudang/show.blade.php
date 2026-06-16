@extends('layouts.app')
@section('title', 'Detail StokGudang - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-eye"></i> Detail StokGudang</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('stok-gudang.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-striped mb-0">
            <tr><th width="25%">Id</th><td>{{ $data->id }}</td></tr>
            <tr><th width="25%">Obat Alkes Id</th><td>{{ $data->obat_alkes_id }}</td></tr>
            <tr><th width="25%">No Batch</th><td>{{ $data->no_batch }}</td></tr>
            <tr><th width="25%">Tanggal Kedaluwarsa</th><td>{{ $data->tanggal_kedaluwarsa }}</td></tr>
            <tr><th width="25%">Jumlah Masuk</th><td>{{ $data->jumlah_masuk }}</td></tr>
            <tr><th width="25%">Jumlah Keluar</th><td>{{ $data->jumlah_keluar }}</td></tr>
            <tr><th width="25%">Stok Tersedia</th><td>{{ $data->stok_tersedia }}</td></tr>
            <tr><th width="25%">Harga Perolehan</th><td>{{ $data->harga_perolehan }}</td></tr>
            <tr><th width="25%">Pengeluaran Id</th><td>{{ $data->pengeluaran_id }}</td></tr>
            <tr><th width="25%">Created At</th><td>{{ $data->created_at }}</td></tr>
            <tr><th width="25%">Updated At</th><td>{{ $data->updated_at }}</td></tr>
        </table>
    </div>
</div>
@endsection