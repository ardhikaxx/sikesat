@extends('layouts.app')
@section('title', 'Data SpmCapaian - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-table"></i> Data SpmCapaian</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('spm-capaian.create') }}" class="btn-primary-sikesat"><i class="fas fa-plus"></i> Tambah Data</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table sikesat-table">
                <thead>
                    <tr>
                        <th>Spm Indikator Id</th>
                        <th>Periode Bulan</th>
                        <th>Periode Tahun</th>
                        <th>Nilai Capaian</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{ $item->spm_indikator_id }}</td>
                        <td>{{ $item->periode_bulan }}</td>
                        <td>{{ $item->periode_tahun }}</td>
                        <td>{{ $item->nilai_capaian }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('spm-capaian.show', $item->id) }}" class="btn-action btn-action-view"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('spm-capaian.edit', $item->id) }}" class="btn-action btn-action-edit"><i class="fas fa-pen"></i></a>
                                <form action="{{ route('spm-capaian.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
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