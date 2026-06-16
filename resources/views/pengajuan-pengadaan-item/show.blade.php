@extends('layouts.app')
@section('title', 'Detail PengajuanPengadaanItem - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-eye"></i> Detail PengajuanPengadaanItem</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('pengajuan-pengadaan-item.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-striped mb-0">
            <tr><th width="25%">Id</th><td>{{ $data->id }}</td></tr>
            <tr><th width="25%">Pengajuan Id</th><td>{{ $data->pengajuan_id }}</td></tr>
            <tr><th width="25%">Nama Barang</th><td>{{ $data->nama_barang }}</td></tr>
            <tr><th width="25%">Spesifikasi</th><td>{{ $data->spesifikasi }}</td></tr>
            <tr><th width="25%">Satuan</th><td>{{ $data->satuan }}</td></tr>
            <tr><th width="25%">Jumlah</th><td>{{ $data->jumlah }}</td></tr>
            <tr><th width="25%">Harga Estimasi</th><td>{{ $data->harga_estimasi }}</td></tr>
            <tr><th width="25%">Subtotal</th><td>{{ $data->subtotal }}</td></tr>
            <tr><th width="25%">Created At</th><td>{{ $data->created_at }}</td></tr>
            <tr><th width="25%">Updated At</th><td>{{ $data->updated_at }}</td></tr>
        </table>
    </div>
</div>
@endsection