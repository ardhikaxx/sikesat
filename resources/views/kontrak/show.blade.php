@extends('layouts.app')
@section('title', 'Detail Kontrak - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-file-contract"></i> Detail Kontrak</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('kontrak.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table table-bordered">
            <tr>
                <th width="30%">Nomor Kontrak</th>
                <td>{{ $kontrak->nomor_kontrak }}</td>
            </tr>
            <tr>
                <th>Nama Vendor / Rekanan</th>
                <td>{{ $kontrak->nama_vendor }}</td>
            </tr>
            <tr>
                <th>Jenis Kontrak</th>
                <td>{{ str_replace('_', ' ', $kontrak->jenis_kontrak) }}</td>
            </tr>
            <tr>
                <th>Tanggal Mulai</th>
                <td>{{ $kontrak->tanggal_mulai ? $kontrak->tanggal_mulai->format('d/m/Y') : '-' }}</td>
            </tr>
            <tr>
                <th>Tanggal Selesai</th>
                <td>{{ $kontrak->tanggal_selesai ? $kontrak->tanggal_selesai->format('d/m/Y') : '-' }}</td>
            </tr>
            <tr>
                <th>Nilai Kontrak</th>
                <td>Rp {{ number_format($kontrak->nilai_kontrak, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    @if($kontrak->status == 'Aktif')
                        <span class="badge bg-success">Aktif</span>
                    @elseif($kontrak->status == 'Selesai')
                        <span class="badge bg-secondary">Selesai</span>
                    @else
                        <span class="badge bg-danger">Dihentikan</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td>{{ $kontrak->keterangan ?? '-' }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection
