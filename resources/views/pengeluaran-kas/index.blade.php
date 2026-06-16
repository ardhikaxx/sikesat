@extends('layouts.app')
@section('title', 'Data PengeluaranKas - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-table"></i> Data PengeluaranKas</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('pengeluaran-kas.create') }}" class="btn-primary-sikesat"><i class="fas fa-plus"></i> Tambah Data</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table sikesat-table align-middle">
                <thead>
                    <tr>
                        <th>No Bukti / Tgl</th>
                        <th>Keterangan</th>
                        <th>S. Dana</th>
                        <th class="text-end">Nominal (Neto)</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>
                            <span class="fw-bold text-primary">{{ $item->no_bukti }}</span><br>
                            <small class="text-muted">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</small>
                        </td>
                        <td>{{ \Illuminate\Support\Str::limit($item->keterangan, 40) }}</td>
                        <td>{{ $item->sumberDana->nama ?? 'BOK/PAD' }}</td>
                        <td class="text-end fw-bold">Rp {{ number_format($item->jumlah_neto, 0, ',', '.') }}</td>
                        <td class="text-center">
                            @if($item->status == 'draft')
                                <span class="badge bg-secondary">Draft</span>
                            @elseif($item->status == 'diverifikasi' || $item->status == 'disetujui')
                                <span class="badge bg-warning text-dark">Diverifikasi</span>
                            @elseif($item->status == 'dibayar')
                                <span class="badge bg-success">Dibayar</span>
                            @else
                                <span class="badge bg-danger">{{ ucfirst($item->status) }}</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <!-- Verify Button for Draft -->
                                @if($item->status == 'draft')
                                    <form action="{{ route('pengeluaran-kas.verify', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Verifikasi SPJ ini?')">
                                        @csrf
                                        <button class="btn btn-sm btn-warning" title="Verifikasi SPJ"><i class="fas fa-check-double"></i></button>
                                    </form>
                                @endif
                                
                                <!-- Pay Button for Verified -->
                                @if($item->status == 'diverifikasi' || $item->status == 'disetujui')
                                    <form action="{{ route('pengeluaran-kas.pay', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Cairkan dana untuk pengeluaran ini?')">
                                        @csrf
                                        <button class="btn btn-sm btn-success" title="Bayar / Cairkan"><i class="fas fa-money-bill-wave"></i></button>
                                    </form>
                                @endif

                                <a href="{{ route('pengeluaran-kas.show', $item->id) }}" class="btn-action btn-action-view" title="Detail"><i class="fas fa-eye"></i></a>
                                
                                @if($item->status == 'draft')
                                    <a href="{{ route('pengeluaran-kas.edit', $item->id) }}" class="btn-action btn-action-edit"><i class="fas fa-pen"></i></a>
                                    <form action="{{ route('pengeluaran-kas.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                        @csrf @method('DELETE')
                                        <button class="btn-action btn-action-delete"><i class="fas fa-trash"></i></button>
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