@extends('layouts.app')

@section('title', 'Master Obat & Alkes - SIKESAT')

@push('styles')
<style>
.sikesat-table thead th { background: var(--teal-primary); color: #FFFFFF; font-size: 0.8125rem; font-weight: 600; text-transform: uppercase; padding: 12px 16px; border: none; }
.sikesat-table tbody td { font-size: 0.875rem; padding: 10px 16px; vertical-align: middle; border-bottom: 1px solid #EDF2F7; }
.sikesat-table tbody tr:hover { background: var(--teal-bg); }
.btn-action { width: 32px; height: 32px; border-radius: 6px; border: 1px solid; display: inline-flex; align-items: center; justify-content: center; }
.btn-action-view { border-color: #1565C0; color: #1565C0; background: #DBEAFE; }
.btn-action-edit { border-color: #D4860B; color: #D4860B; background: #FFF3CD; }
</style>
@endpush

@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-pills"></i> Master Obat & Alkes</h1>
    </div>
    <div class="page-header__actions">
        <button class="btn-primary-sikesat"><i class="fas fa-plus"></i> Tambah Data Baru</button>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table sikesat-table" id="dataTable">
            <thead>
                <tr>
                    <th>Kode Barang</th>
                    <th>Nama Generik</th>
                    <th>Satuan</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($obats as $o)
                <tr>
                    <td class="nominal text-teal fw-bold">{{ $o->kode_barang }}</td>
                    <td class="fw-semibold">{{ $o->nama_generik }}</td>
                    <td>{{ $o->satuan }}</td>
                    <td>
                        @if($o->is_aktif)
                            <span class="badge bg-success rounded-pill px-3">Aktif</span>
                        @else
                            <span class="badge bg-danger rounded-pill px-3">Nonaktif</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <button class="btn-action btn-action-view"><i class="fas fa-eye"></i></button>
                        <button class="btn-action btn-action-edit"><i class="fas fa-pen"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection


@endpush
