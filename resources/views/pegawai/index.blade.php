@extends('layouts.app')

@section('title', 'Data Pegawai - SIKESAT')

@push('styles')
<style>
/* Tabel SIKESAT */
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
.sikesat-table tbody tr:hover {
    background: var(--teal-bg);
}
.sikesat-table tbody td {
    font-size: 0.875rem;
    color: var(--text-main);
    padding: 10px 16px;
    vertical-align: middle;
    border-bottom: 1px solid #EDF2F7;
}

.btn-action {
    width: 32px;
    height: 32px;
    border-radius: 6px;
    border: 1px solid;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
    transition: all 0.15s ease;
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
            <i class="fas fa-users"></i>
            Master Data Pegawai
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active">Master Pegawai</li>
            </ol>
        </nav>
    </div>
    <div class="page-header__actions">
        <button class="btn-primary-sikesat">
            <i class="fas fa-plus"></i> Tambah Pegawai
        </button>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table sikesat-table" id="dataTable">
            <thead>
                <tr>
                    <th>NIP</th>
                    <th>Nama Lengkap</th>
                    <th>Jabatan</th>
                    <th>Jenis Pegawai</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pegawais as $p)
                <tr>
                    <td class="nominal">{{ $p->nip ?? '-' }}</td>
                    <td class="fw-semibold">{{ $p->nama }}</td>
                    <td>{{ $p->jabatan ?? '-' }}</td>
                    <td>{{ $p->jenis_pegawai }}</td>
                    <td>
                        @if($p->status_aktif)
                            <span class="badge bg-success rounded-pill px-3">Aktif</span>
                        @else
                            <span class="badge bg-danger rounded-pill px-3">Nonaktif</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <button class="btn-action btn-action-view" title="Detail"><i class="fas fa-eye"></i></button>
                        <button class="btn-action btn-action-edit" title="Edit"><i class="fas fa-pen"></i></button>
                        <button class="btn-action btn-action-delete" title="Hapus" onclick="konfirmasiHapus({{ $p->id }}, '{{ $p->nama }}')"><i class="fas fa-trash"></i></button>
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
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json',
        }
    });
});

function konfirmasiHapus(id, nama) {
    Swal.fire({
        icon: 'warning',
        title: 'Konfirmasi Hapus',
        html: `Apakah Anda yakin ingin menghapus pegawai <strong>${nama}</strong>?<br>
                <small class="text-muted">Data yang dihapus tidak dapat dikembalikan.</small>`,
        showCancelButton: true,
        confirmButtonColor: '#C0392B',
        cancelButtonColor: '#718096',
        confirmButtonText: '<i class="fas fa-trash"></i> Ya, Hapus',
        cancelButtonText: 'Batal',
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            SikeAlert.sukses('Fitur hapus berhasil disimulasikan (mode demo).');
        }
    });
}
</script>
@endpush
