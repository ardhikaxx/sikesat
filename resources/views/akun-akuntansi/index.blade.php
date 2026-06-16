@extends('layouts.app')

@section('title', 'Bagan Akun Standar (COA) - SIKESAT')

@push('styles')
<style>
.sikesat-table thead th { background: var(--teal-primary); color: #FFFFFF; font-size: 0.8125rem; font-weight: 600; text-transform: uppercase; padding: 12px 16px; border: none; white-space: nowrap; }
.sikesat-table tbody tr:hover { background: var(--teal-bg); }
.sikesat-table tbody td { font-size: 0.875rem; color: var(--text-main); padding: 10px 16px; vertical-align: middle; border-bottom: 1px solid #EDF2F7; }
.level-1 { font-weight: bold; background-color: #F7FAFC; }
.level-2 { padding-left: 20px !important; font-weight: 600; }
.level-3 { padding-left: 40px !important; }
.level-4 { padding-left: 60px !important; font-style: italic; color: #4A5568; }
.btn-action { width: 32px; height: 32px; border-radius: 6px; border: 1px solid; display: inline-flex; align-items: center; justify-content: center; font-size: 0.75rem; }
.btn-action-edit { border-color: #D4860B; color: #D4860B; background: #FFF3CD; }
</style>
@endpush

@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-book"></i> Bagan Akun Standar (COA)</h1>
        <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li><li class="breadcrumb-item active">Master COA</li></ol></nav>
    </div>
    <div class="page-header__actions">
        <button class="btn-primary-sikesat"><i class="fas fa-plus"></i> Tambah Akun</button>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table sikesat-table" id="dataTable">
            <thead>
                <tr>
                    <th width="15%">Kode Akun</th>
                    <th width="40%">Nama Akun</th>
                    <th>Jenis</th>
                    <th>Saldo Normal</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($akuns as $akun)
                <tr class="{{ $akun->level == 1 ? 'level-1' : '' }}">
                    <td class="nominal fw-bold text-teal">{{ $akun->kode_akun }}</td>
                    <td class="level-{{ $akun->level }}">{{ $akun->nama_akun }}</td>
                    <td class="text-uppercase" style="font-size: 11px;">{{ str_replace('_', ' ', $akun->jenis_akun) }}</td>
                    <td><span class="badge {{ $akun->saldo_normal == 'debit' ? 'bg-primary' : 'bg-warning text-dark' }} rounded-pill">{{ ucfirst($akun->saldo_normal) }}</span></td>
                    <td class="text-center">
                        <button class="btn-action btn-action-edit" title="Edit"><i class="fas fa-pen"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
