@extends('layouts.app')

@section('title', 'Jurnal Umum - SIKESAT')

@push('styles')
<style>
.sikesat-table thead th { background: var(--teal-primary); color: #FFFFFF; font-size: 0.8125rem; font-weight: 600; text-transform: uppercase; padding: 12px 16px; border: none; }
.sikesat-table tbody td { font-size: 0.875rem; padding: 10px 16px; vertical-align: middle; border-bottom: 1px solid #EDF2F7; }
.sikesat-table tbody tr:hover { background: var(--teal-bg); }
.badge-status { display: inline-flex; align-items: center; gap: 4px; padding: 4px 10px; border-radius: 20px; font-size: 0.75rem; font-weight: 600; }
.badge-status::before { content: '●'; font-size: 0.5rem; }
.badge-status--draft { background: #EDF2F7; color: #718096; }
.badge-status--posted { background: #E8F5F5; color: #0D6E6E; }
.btn-action { width: 32px; height: 32px; border-radius: 6px; border: 1px solid; display: inline-flex; align-items: center; justify-content: center; }
.btn-action-view { border-color: #1565C0; color: #1565C0; background: #DBEAFE; }
</style>
@endpush

@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-book"></i> Jurnal Umum</h1>
    </div>
    <div class="page-header__actions">
        <button class="btn-primary-sikesat"><i class="fas fa-plus"></i> Buat Jurnal</button>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table sikesat-table" id="dataTable">
            <thead>
                <tr>
                    <th>No. Jurnal</th>
                    <th>Tanggal</th>
                    <th>Sumber</th>
                    <th>Keterangan</th>
                    <th class="text-end">Total Debit/Kredit (Rp)</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jurnals as $j)
                <tr>
                    <td class="nominal text-teal fw-bold">{{ $j->no_jurnal }}</td>
                    <td>{{ \Carbon\Carbon::parse($j->tanggal)->format('d M Y') }}</td>
                    <td class="text-uppercase" style="font-size: 11px;">{{ $j->sumber }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($j->keterangan, 50) }}</td>
                    <td class="nominal fw-bold text-end">{{ number_format($j->total_debit, 0, ',', '.') }}</td>
                    <td><span class="badge-status badge-status--{{ $j->status }}">{{ ucfirst($j->status) }}</span></td>
                    <td class="text-center"><button class="btn-action btn-action-view"><i class="fas fa-eye"></i></button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection


@endpush
