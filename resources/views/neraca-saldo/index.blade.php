@extends('layouts.app')
@section('title', 'Data NeracaSaldo - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-table"></i> Data NeracaSaldo</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('neraca-saldo.create') }}" class="btn-primary-sikesat"><i class="fas fa-plus"></i> Tambah Data</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table sikesat-table">
                <thead>
                    <tr>
                        <th>Periode Bulan</th>
                        <th>Periode Tahun</th>
                        <th>Akun Id</th>
                        <th>Saldo Awal Debit</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{ $item->periode_bulan }}</td>
                        <td>{{ $item->periode_tahun }}</td>
                        <td>{{ $item->akun_id }}</td>
                        <td>{{ $item->saldo_awal_debit }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('neraca-saldo.show', $item->id) }}" class="btn-action btn-action-view"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('neraca-saldo.edit', $item->id) }}" class="btn-action btn-action-edit"><i class="fas fa-pen"></i></a>
                                <form action="{{ route('neraca-saldo.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
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