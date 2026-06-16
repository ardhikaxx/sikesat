@extends('layouts.app')

@section('title', 'Rencana Bisnis Anggaran (RBA) - SIKESAT')



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
                        <a href="{{ route('rencana-bisnis-anggaran.show', $r->id) }}" class="btn-action btn-action-view"><i class="fas fa-eye"></i></a>
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

