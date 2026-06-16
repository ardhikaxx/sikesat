@extends('layouts.app')
@section('title', 'Profil Pengguna - SIKESAT')

@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-user-circle"></i> Profil Saya</h1>
        <p class="text-muted mb-0">Kelola informasi data diri dan kata sandi Anda.</p>
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm rounded-3 text-center p-4 h-100">
            <div class="mb-3">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=0D6E6E&color=fff&size=128" class="rounded-circle shadow-sm" alt="Profile Image">
            </div>
            <h4 class="fw-bold mb-1">{{ $user->name }}</h4>
            <p class="text-muted mb-3">{{ $user->email }}</p>
            <div class="badge bg-primary text-uppercase px-3 py-2 rounded-pill">
                {{ $user->getRoleNames()->first() ?? 'Pengguna' }}
            </div>
        </div>
    </div>
    
    <div class="col-md-8 mb-4">
        <div class="card border-0 shadow-sm rounded-3 mb-4">
            <div class="card-header bg-white border-0 pt-4 pb-0">
                <h5 class="fw-bold text-primary"><i class="fas fa-id-card me-2"></i> Informasi Dasar</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Alamat Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i> Simpan Perubahan</button>
                </form>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-header bg-white border-0 pt-4 pb-0">
                <h5 class="fw-bold text-danger"><i class="fas fa-lock me-2"></i> Ubah Kata Sandi</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('profile.password') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kata Sandi Saat Ini</label>
                        <input type="password" name="current_password" class="form-control" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Kata Sandi Baru</label>
                            <input type="password" name="password" class="form-control" required minlength="6">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-semibold">Konfirmasi Kata Sandi Baru</label>
                            <input type="password" name="password_confirmation" class="form-control" required minlength="6">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger"><i class="fas fa-key me-2"></i> Perbarui Kata Sandi</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
