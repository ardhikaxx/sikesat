@extends('layouts.app')
@section('title', 'Detail RencanaKegiatanAnggaran - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-eye"></i> Detail RencanaKegiatanAnggaran</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('rencana-kegiatan-anggaran.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-striped mb-0">
            <tr><th width="25%">Id</th><td>{{ $data->id }}</td></tr>
            <tr><th width="25%">Tahun Anggaran Id</th><td>{{ $data->tahun_anggaran_id }}</td></tr>
            <tr><th width="25%">Unit Id</th><td>{{ $data->unit_id }}</td></tr>
            <tr><th width="25%">Sumber Dana Id</th><td>{{ $data->sumber_dana_id }}</td></tr>
            <tr><th width="25%">Kode Kegiatan</th><td>{{ $data->kode_kegiatan }}</td></tr>
            <tr><th width="25%">Nama Kegiatan</th><td>{{ $data->nama_kegiatan }}</td></tr>
            <tr><th width="25%">Tujuan</th><td>{{ $data->tujuan }}</td></tr>
            <tr><th width="25%">Sasaran</th><td>{{ $data->sasaran }}</td></tr>
            <tr><th width="25%">Target Kuantitas</th><td>{{ $data->target_kuantitas }}</td></tr>
            <tr><th width="25%">Satuan Target</th><td>{{ $data->satuan_target }}</td></tr>
            <tr><th width="25%">Total Pagu</th><td>{{ $data->total_pagu }}</td></tr>
            <tr><th width="25%">Status</th><td>{{ $data->status }}</td></tr>
            <tr><th width="25%">Diajukan Oleh</th><td>{{ $data->diajukan_oleh }}</td></tr>
            <tr><th width="25%">Diajukan At</th><td>{{ $data->diajukan_at }}</td></tr>
            <tr><th width="25%">Diverifikasi Oleh</th><td>{{ $data->diverifikasi_oleh }}</td></tr>
            <tr><th width="25%">Diverifikasi At</th><td>{{ $data->diverifikasi_at }}</td></tr>
            <tr><th width="25%">Disetujui Oleh</th><td>{{ $data->disetujui_oleh }}</td></tr>
            <tr><th width="25%">Disetujui At</th><td>{{ $data->disetujui_at }}</td></tr>
            <tr><th width="25%">Catatan Revisi</th><td>{{ $data->catatan_revisi }}</td></tr>
            <tr><th width="25%">Created At</th><td>{{ $data->created_at }}</td></tr>
            <tr><th width="25%">Updated At</th><td>{{ $data->updated_at }}</td></tr>
        </table>
    </div>
</div>
@endsection