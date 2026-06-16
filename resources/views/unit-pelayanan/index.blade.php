@extends('layouts.app')

@section('title', 'Unit Pelayanan - SIKESAT')

@push('styles')
<style>
/* Base Table SIKESAT */
.sikesat-table thead th {
    background: var(--teal-primary);
    color: #FFFFFF;
    font-size: 0.8125rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.04em;
    border: none;
    padding: 12px 16px;
    white-space: nowrap;
}
.sikesat-table tbody tr:hover { background: var(--teal-bg); }
.sikesat-table tbody td {
    font-size: 0.875rem;
    color: var(--text-main);
    padding: 10px 16px;
    vertical-align: middle;
    border-bottom: 1px solid #EDF2F7;
}
.btn-action {
    width: 32px; height: 32px; border-radius: 6px; border: 1px solid;
    display: inline-flex; align-items: center; justify-content: center;
    font-size: 0.75rem; transition: all 0.15s ease;
}
.btn-action-view   { border-color: #1565C0; color: #1565C0; background: #DBEAFE; }
.btn-action-edit   { border-color: #D4860B; color: #D4860B; background: #FFF3CD; }
.btn-action-delete { border-color: #C0392B; color: #C0392B; background: #F8D7DA; }
</style>
@endpush

@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title">
            <i class="fas fa-sitemap"></i>
            Master Data Unit Pelayanan
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active">Unit Pelayanan</li>
            </ol>
        </nav>
    </div>
    <div class="page-header__actions">
        <button class="btn-primary-sikesat">
            <i class="fas fa-plus"></i> Tambah Unit
        </button>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table sikesat-table" id="dataTable">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Unit</th>
                    <th>Jenis</th>
                    <th>Kepala Unit</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($units as $u)
                <tr>
                    <td class="nominal fw-bold text-teal">{{ $u->kode }}</td>
                    <td class="fw-semibold">{{ $u->nama }}</td>
                    <td><span class="badge bg-secondary rounded-pill text-uppercase" style="font-size: 11px;">{{ str_replace('_', ' ', $u->jenis) }}</span></td>
                    <td>{{ $u->kepala_unit ?? '-' }}</td>
                    <td>
                        @if($u->is_aktif)
                            <span class="badge bg-success rounded-pill px-3">Aktif</span>
                        @else
                            <span class="badge bg-danger rounded-pill px-3">Nonaktif</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <button class="btn-action btn-action-view" title="Detail"><i class="fas fa-eye"></i></button>
                        <button class="btn-action btn-action-edit" title="Edit"><i class="fas fa-pen"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#dataTable').DataTable({
        language: { url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json' }
    });
});
</script>
@endpush
