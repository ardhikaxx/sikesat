@extends('layouts.app')

@section('title', 'Manajemen Pengguna - SIKESAT')



@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-users-cog"></i> Manajemen Pengguna & Akses</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('user.create') }}" class="btn-primary-sikesat text-decoration-none"><i class="fas fa-user-plus"></i> Tambah Pengguna</a>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table class="table sikesat-table" id="dataTable">
            <thead>
                <tr>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role (Hak Akses)</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td class="nominal text-teal fw-bold">{{ $user->nip ?? '-' }}</td>
                    <td class="fw-semibold">{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach($user->roles as $role)
                            <span class="badge bg-secondary rounded-pill text-uppercase" style="font-size: 11px;">{{ str_replace('_', ' ', $role->name) }}</span>
                        @endforeach
                    </td>
                    <td>
                        @if($user->is_active)
                            <span class="badge bg-success rounded-pill px-3">Aktif</span>
                        @else
                            <span class="badge bg-danger rounded-pill px-3">Nonaktif</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center gap-1">
                            <a href="{{ route('user.edit', $user->id) }}" class="btn-action btn-action-edit" title="Edit Pengguna"><i class="fas fa-pen"></i></a>
                            @if($user->id != 1 && $user->id != auth()->id())
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus pengguna ini secara permanen?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-action btn-action-delete" title="Hapus Pengguna"><i class="fas fa-trash"></i></button>
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
@endsection


