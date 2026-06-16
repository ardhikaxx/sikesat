@extends('layouts.app')
@section('title', 'Master Tarif Layanan - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-tags"></i> Master Tarif Layanan</h1>
        <p class="text-muted mb-0">Kelola tarif Tindakan medis, Kamar rawat inap, dan layanan lainnya.</p>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('tarif-layanan.create') }}" class="btn-primary-sikesat"><i class="fas fa-plus"></i> Tambah Tarif Baru</a>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success border-0 shadow-sm"><i class="fas fa-check-circle me-2"></i> {{ session('success') }}</div>
@endif

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table sikesat-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Nama Layanan / Tindakan / Kamar</th>
                        <th class="text-end">Tarif (Rp)</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $idx => $item)
                    <tr>
                        <td>{{ $idx + 1 }}</td>
                        <td>
                            @if($item->kategori == 'Tindakan') <span class="badge bg-primary">Tindakan</span> @endif
                            @if($item->kategori == 'Kamar') <span class="badge bg-info text-dark">Kamar Rawat Inap</span> @endif
                            @if($item->kategori == 'Lainnya') <span class="badge bg-secondary">Lainnya</span> @endif
                        </td>
                        <td class="fw-semibold">{{ $item->nama_layanan }}</td>
                        <td class="text-end fw-bold text-success">Rp {{ number_format($item->tarif, 0, ',', '.') }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('tarif-layanan.edit', $item->id) }}" class="btn-action btn-action-edit" title="Edit"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('tarif-layanan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data tarif ini?')">
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
