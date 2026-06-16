@extends('layouts.app')
@section('title', 'Data PengajuanPengadaan - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-shopping-cart"></i> E-Procurement (Pengadaan)</h1>
        <p class="text-muted mb-0">Manajemen pengajuan dan persetujuan pengadaan barang puskesmas.</p>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('pengajuan-pengadaan.create') }}" class="btn-primary-sikesat"><i class="fas fa-plus"></i> Tambah Data</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table sikesat-table align-middle">
                <thead>
                    <tr>
                        <th>No. Pengajuan</th>
                        <th>Unit Pengusul</th>
                        <th>Kategori / Deskripsi</th>
                        <th class="text-end">Estimasi Biaya</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi (Persetujuan)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>
                            <span class="fw-bold text-primary">{{ $item->no_pengajuan }}</span><br>
                            <small class="text-muted"><i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($item->tanggal_pengajuan)->format('d M Y') }}</small>
                        </td>
                        <td>{{ $item->unit->nama_unit ?? 'Poli/Unit' }}</td>
                        <td>
                            <span class="badge bg-info text-dark mb-1">{{ $item->jenis_pengadaan }}</span><br>
                            {{ \Illuminate\Support\Str::limit($item->deskripsi, 40) }}
                        </td>
                        <td class="text-end fw-bold">Rp {{ number_format($item->total_estimasi, 0, ',', '.') }}</td>
                        <td class="text-center">
                            @if($item->status == 'draft')
                                <span class="badge bg-secondary">Draft</span>
                            @elseif($item->status == 'diverifikasi')
                                <span class="badge bg-warning text-dark">Diverifikasi (KTU)</span>
                            @elseif($item->status == 'disetujui')
                                <span class="badge bg-success">Disetujui (Kapus)</span>
                            @elseif($item->status == 'ditolak')
                                <span class="badge bg-danger">Ditolak</span>
                            @else
                                <span class="badge bg-primary">{{ ucfirst($item->status) }}</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <!-- Tombol Verifikasi (Hanya muncul jika Draft) -->
                                @if($item->status == 'draft')
                                    <form action="{{ route('pengajuan-pengadaan.verify', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Verifikasi pengajuan ini sebagai Kepala Tata Usaha?')">
                                        @csrf
                                        <button class="btn btn-sm btn-warning text-dark" title="Verifikasi (KTU)"><i class="fas fa-file-signature"></i> Verif</button>
                                    </form>
                                @endif
                                
                                <!-- Tombol Setujui/Tolak (Hanya muncul jika Diverifikasi) -->
                                @if($item->status == 'diverifikasi')
                                    <form action="{{ route('pengajuan-pengadaan.approve', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Setujui pengajuan ini secara final sebagai Kepala Puskesmas?')">
                                        @csrf
                                        <button class="btn btn-sm btn-success" title="Setujui (Kapus)"><i class="fas fa-check-circle"></i> Setujui</button>
                                    </form>
                                    
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal{{ $item->id }}" title="Tolak Pengajuan">
                                        <i class="fas fa-times-circle"></i> Tolak
                                    </button>
                                @endif

                                <a href="{{ route('pengajuan-pengadaan.show', $item->id) }}" class="btn-action btn-action-view" title="Lihat Rincian Barang"><i class="fas fa-eye"></i></a>
                                
                                @if($item->status == 'draft')
                                    <form action="{{ route('pengajuan-pengadaan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                        @csrf @method('DELETE')
                                        <button class="btn-action btn-action-delete" title="Hapus"><i class="fas fa-trash"></i></button>
                                    </form>
                                @endif
                            </div>

                            <!-- Modal Tolak -->
                            @if($item->status == 'diverifikasi')
                            <div class="modal fade" id="rejectModal{{ $item->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content text-start">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tolak Pengajuan {{ $item->no_pengajuan }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="{{ route('pengajuan-pengadaan.reject', $item->id) }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Alasan Penolakan</label>
                                                    <textarea name="catatan" class="form-control" rows="3" required></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger">Tolak Pengajuan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection