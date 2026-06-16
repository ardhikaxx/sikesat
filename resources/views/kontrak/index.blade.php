@extends('layouts.app')
@section('title', 'Data Kontrak Pihak Ketiga - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-handshake"></i> Kontrak Pihak Ketiga</h1>
        <p class="text-muted mb-0">Manajemen MOU dan Kontrak KSO / Pihak Ketiga (Limbah B3, dll).</p>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('kontrak.create') }}" class="btn-primary-sikesat"><i class="fas fa-plus"></i> Tambah Kontrak</a>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table sikesat-table">
                <thead>
                    <tr>
                        <th>Nomor Kontrak</th>
                        <th>Vendor & Jenis</th>
                        <th>Periode Kontrak</th>
                        <th>Nilai Kontrak</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td class="fw-bold">{{ $item->nomor_kontrak }}</td>
                        <td>
                            <div class="fw-semibold text-dark">{{ $item->nama_vendor }}</div>
                            <div class="text-muted small">{{ str_replace('_', ' ', $item->jenis_kontrak) }}</div>
                        </td>
                        <td>
                            <div>{{ $item->tanggal_mulai ? $item->tanggal_mulai->format('d/m/Y') : '-' }} s/d</div>
                            <div class="fw-bold {{ $item->tanggal_selesai && $item->tanggal_selesai < now() ? 'text-danger' : 'text-success' }}">
                                {{ $item->tanggal_selesai ? $item->tanggal_selesai->format('d/m/Y') : '-' }}
                            </div>
                        </td>
                        <td class="text-end">Rp {{ number_format($item->nilai_kontrak, 0, ',', '.') }}</td>
                        <td>
                            @if($item->status == 'Aktif')
                                <span class="badge bg-success">Aktif</span>
                            @elseif($item->status == 'Selesai')
                                <span class="badge bg-secondary">Selesai</span>
                            @else
                                <span class="badge bg-danger">Dihentikan</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('kontrak.show', $item->id) }}" class="btn-action btn-action-view" title="Detail"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('kontrak.edit', $item->id) }}" class="btn-action btn-action-edit" title="Edit"><i class="fas fa-pen"></i></a>
                                <form action="{{ route('kontrak.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn-action btn-action-delete" title="Hapus"><i class="fas fa-trash"></i></button>
                                </form>
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
