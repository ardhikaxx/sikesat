@extends('layouts.app')
@section('title', 'Data RencanaKegiatanAnggaran - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-table"></i> Data RencanaKegiatanAnggaran</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('rencana-kegiatan-anggaran.create') }}" class="btn-primary-sikesat"><i class="fas fa-plus"></i> Tambah Data</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table sikesat-table">
                <thead>
                    <tr>
                        <th>Tahun Anggaran Id</th>
                        <th>Unit Id</th>
                        <th>Sumber Dana Id</th>
                        <th>Kode Kegiatan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{ $item->tahun_anggaran_id }}</td>
                        <td>{{ $item->unit_id }}</td>
                        <td>{{ $item->sumber_dana_id }}</td>
                        <td>{{ $item->kode_kegiatan }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('rencana-kegiatan-anggaran.show', $item->id) }}" class="btn-action btn-action-view"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('rencana-kegiatan-anggaran.edit', $item->id) }}" class="btn-action btn-action-edit"><i class="fas fa-pen"></i></a>
                                <form action="{{ route('rencana-kegiatan-anggaran.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
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