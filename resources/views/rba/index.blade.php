@extends('layouts.app')

@section('title', 'Rencana Bisnis Anggaran (RBA) - SIKESAT')

@push('styles')
<style>
.sikesat-table thead th { background: var(--teal-primary); color: #FFFFFF; font-size: 0.8125rem; font-weight: 600; text-transform: uppercase; padding: 12px 16px; border: none; }
.sikesat-table tbody td { font-size: 0.875rem; padding: 10px 16px; vertical-align: middle; border-bottom: 1px solid #EDF2F7; }
.sikesat-table tbody tr:hover { background: var(--teal-bg); }
.badge-status { display: inline-flex; align-items: center; gap: 4px; padding: 4px 10px; border-radius: 20px; font-size: 0.75rem; font-weight: 600; }
.badge-status::before { content: '●'; font-size: 0.5rem; }
.badge-status--draft { background: #EDF2F7; color: #718096; }
.badge-status--disahkan { background: #D4EDDA; color: #1A7F5A; }
.btn-action { width: 32px; height: 32px; border-radius: 6px; border: 1px solid; display: inline-flex; align-items: center; justify-content: center; }
.btn-action-view { border-color: #1565C0; color: #1565C0; background: #DBEAFE; }
</style>
@endpush

@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-chart-line"></i> Rencana Bisnis Anggaran (RBA)</h1>
    </div>
    <div class="page-header__actions">
        <button class="btn-primary-sikesat"><i class="fas fa-plus"></i> Usulkan RBA Baru</button>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table sikesat-table" id="dataTable">
            <thead>
                <tr>
                    <th>Tahun</th>
                    <th>Jenis</th>
                    <th>Unit Pelayanan</th>
                    <th>Sumber Dana</th>
                    <th class="text-end">Total Target (Rp)</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rbas as $r)
                <tr>
                    <td class="nominal fw-bold text-teal">{{ $r->tahun_anggaran->tahun ?? '-' }}</td>
                    <td><span class="badge bg-secondary text-uppercase">{{ $r->jenis }}</span></td>
                    <td>{{ $r->unit->nama ?? 'Semua Unit' }}</td>
                    <td>{{ $r->sumber_dana->nama ?? '-' }}</td>
                    <td class="nominal fw-bold text-end">{{ number_format($r->total_target, 0, ',', '.') }}</td>
                    <td><span class="badge-status badge-status--{{ $r->status }}">{{ ucfirst($r->status) }}</span></td>
                    <td class="text-center">
                        <button class="btn-action btn-action-view"><i class="fas fa-eye"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if($rbas->isEmpty())
        <div class="text-center py-4 text-muted">Belum ada dokumen RBA yang diusulkan.</div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() { $('#dataTable').DataTable({ language: { url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json' } }); });
</script>
@endpush
