@extends('layouts.app')
@section('title', 'Data Pegawai - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-table"></i> Data Pegawai</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('pegawai.create') }}" class="btn-primary-sikesat"><i class="fas fa-plus"></i> Tambah Data</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table sikesat-table">
                <thead>
                    <tr>
                        <th>NIP</th>
                        <th>Nama & Jabatan</th>
                        <th>Status Pegawai</th>
                        <th>Izin SIP</th>
                        <th>Izin STR</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td class="fw-semibold text-teal">{{ $item->nip ?? '-' }}</td>
                        <td>
                            <div class="fw-bold">{{ $item->nama }}</div>
                            <div class="text-muted small">{{ $item->jabatan ?? '-' }}</div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border">{{ $item->jenis_pegawai }}</span>
                            @if($item->status_aktif)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-danger">Nonaktif</span>
                            @endif
                        </td>
                        <td>
                            @if($item->no_sip)
                                <div>{{ $item->no_sip }}</div>
                                @if($item->tanggal_berakhir_sip)
                                    @php
                                        $diffSip = \Carbon\Carbon::now()->diffInDays($item->tanggal_berakhir_sip, false);
                                    @endphp
                                    @if($diffSip < 0)
                                        <span class="badge bg-danger"><i class="fas fa-exclamation-circle"></i> Kadaluarsa</span>
                                    @elseif($diffSip <= 30)
                                        <span class="badge bg-warning text-dark"><i class="fas fa-exclamation-triangle"></i> Sisa {{ intval($diffSip) }} Hari</span>
                                    @else
                                        <span class="badge bg-success"><i class="fas fa-check-circle"></i> Berlaku</span>
                                    @endif
                                @endif
                            @else
                                <span class="text-muted small">-</span>
                            @endif
                        </td>
                        <td>
                            @if($item->no_str)
                                <div>{{ $item->no_str }}</div>
                                @if($item->tanggal_berakhir_str)
                                    @php
                                        $diffStr = \Carbon\Carbon::now()->diffInDays($item->tanggal_berakhir_str, false);
                                    @endphp
                                    @if($diffStr < 0)
                                        <span class="badge bg-danger"><i class="fas fa-exclamation-circle"></i> Kadaluarsa</span>
                                    @elseif($diffStr <= 30)
                                        <span class="badge bg-warning text-dark"><i class="fas fa-exclamation-triangle"></i> Sisa {{ intval($diffStr) }} Hari</span>
                                    @else
                                        <span class="badge bg-success"><i class="fas fa-check-circle"></i> Berlaku</span>
                                    @endif
                                @endif
                            @else
                                <span class="text-muted small">-</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('pegawai.show', $item->id) }}" class="btn-action btn-action-view"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('pegawai.edit', $item->id) }}" class="btn-action btn-action-edit"><i class="fas fa-pen"></i></a>
                                <form action="{{ route('pegawai.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn-action btn-action-delete"><i class="fas fa-trash"></i></button>
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