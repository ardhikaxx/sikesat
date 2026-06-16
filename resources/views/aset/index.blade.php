@extends('layouts.app')

@section('title', 'Manajemen Aset - SIKESAT')

@push('styles')
<style>
.sikesat-table thead th { background: var(--teal-primary); color: #FFFFFF; font-size: 0.8125rem; font-weight: 600; text-transform: uppercase; padding: 12px 16px; border: none; }
.sikesat-table tbody td { font-size: 0.875rem; padding: 10px 16px; vertical-align: middle; border-bottom: 1px solid #EDF2F7; }
.sikesat-table tbody tr:hover { background: var(--teal-bg); }
.btn-action { width: 32px; height: 32px; border-radius: 6px; border: 1px solid; display: inline-flex; align-items: center; justify-content: center; }
.btn-action-view { border-color: #1565C0; color: #1565C0; background: #DBEAFE; }
</style>
@endpush

@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-desktop"></i> Manajemen Aset Inventaris</h1>
    </div>
    <div class="page-header__actions">
        <button class="btn-primary-sikesat"><i class="fas fa-plus"></i> Registrasi Aset</button>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table sikesat-table" id="dataTable">
            <thead>
                <tr>
                    <th>Kode Aset</th>
                    <th>Nama Aset</th>
                    <th>Tgl Perolehan</th>
                    <th class="text-end">Nilai (Rp)</th>
                    <th>Kondisi</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($asets as $a)
                <tr>
                    <td class="nominal fw-bold text-teal">{{ $a->kode_aset }}</td>
                    <td class="fw-semibold">{{ $a->nama_aset }}</td>
                    <td>{{ \Carbon\Carbon::parse($a->tanggal_perolehan)->format('d M Y') }}</td>
                    <td class="nominal fw-bold text-end">{{ number_format($a->nilai_perolehan, 0, ',', '.') }}</td>
                    <td>{{ str_replace('_', ' ', $a->kondisi) }}</td>
                    <td><span class="badge bg-primary rounded-pill px-3">{{ $a->status }}</span></td>
                    <td class="text-center">
                        <button class="btn-action btn-action-view"><i class="fas fa-eye"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if($asets->isEmpty())
        <div class="text-center py-4 text-muted">Belum ada data aset yang terdaftar.</div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() { $('#dataTable').DataTable({ language: { url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json' } }); });
</script>
@endpush
