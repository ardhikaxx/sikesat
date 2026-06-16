@extends('layouts.app')
@section('title', 'Billing Pasien - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-cash-register"></i> Kasir / Billing Pasien</h1>
        <p class="text-muted mb-0">Manajemen tagihan terpadu (Tindakan, Obat, Rawat Inap).</p>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('billing.create') }}" class="btn-primary-sikesat"><i class="fas fa-plus"></i> Buat Tagihan Baru</a>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table sikesat-table">
                <thead>
                    <tr>
                        <th>No Invoice</th>
                        <th>Tanggal</th>
                        <th>Nama Pasien</th>
                        <th>Total Tagihan</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td class="fw-bold">{{ $item->no_invoice }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>
                        <td>
                            <div class="fw-semibold text-dark">{{ $item->pasien->nama_lengkap }}</div>
                            <div class="text-muted small">RM: {{ $item->pasien->no_rm }}</div>
                        </td>
                        <td class="fw-bold">Rp {{ number_format($item->total_tagihan, 0, ',', '.') }}</td>
                        <td>
                            @if($item->status == 'Lunas')
                                <span class="badge bg-success"><i class="fas fa-check-circle"></i> Lunas</span>
                            @else
                                <span class="badge bg-danger"><i class="fas fa-times-circle"></i> Belum Bayar</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('billing.show', $item->id) }}" class="btn-action btn-action-view" title="Detail & Bayar"><i class="fas fa-eye"></i></a>
                                @if($item->status == 'Belum Bayar')
                                <form action="{{ route('billing.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Batalkan tagihan ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn-action btn-action-delete" title="Hapus"><i class="fas fa-trash"></i></button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
