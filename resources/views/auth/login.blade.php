<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIKESAT Puskesmas</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Noto+Serif:wght@400;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }
        .login-wrapper {
            min-height: 100vh;
            background: linear-gradient(135deg, #0B3D3D 0%, #0D6E6E 60%, #19A7A7 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .login-card {
            background: #FFFFFF;
            border-radius: 16px;
            padding: 40px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }
        .login-logo {
            text-align: center;
            margin-bottom: 24px;
        }
        .login-logo i {
            font-size: 64px;
            color: #0D6E6E;
            margin-bottom: 12px;
        }
        .login-title {
            font-family: 'Noto Serif', serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: #0B3D3D;
            text-align: center;
        }
        .login-subtitle {
            font-size: 0.875rem;
            color: #718096;
            text-align: center;
            margin-bottom: 28px;
        }
        .form-control {
            border: 1.5px solid #CBD5E0;
            border-radius: 8px;
            padding: 10px 14px;
        }
        .form-control:focus {
            border-color: #19A7A7;
            box-shadow: 0 0 0 3px rgba(25, 167, 167, 0.15);
        }
        .btn-login {
            background: #0D6E6E;
            color: white;
            border-radius: 8px;
            padding: 12px;
            font-weight: 600;
            width: 100%;
            border: none;
            transition: all 0.2s ease;
        }
        .btn-login:hover {
            background: #0B5C5C;
            transform: translateY(-1px);
        }
        .footer-text {
            text-align: center;
            margin-top: 24px;
            font-size: 0.8125rem;
            color: #718096;
        }
    </style>
</head>
<body>

<div class="login-wrapper">
    <div class="login-card">
        <div class="login-logo">
            <i class="fas fa-hospital-user"></i>
        </div>
        <h1 class="login-title">SIKESAT</h1>
        <p class="login-subtitle">Sistem Informasi Keuangan Kesehatan Terpadu</p>

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Email / Username</label>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="fas fa-envelope text-muted"></i></span>
                    <input type="email" name="email" class="form-control border-start-0" placeholder="Masukkan email..." required value="{{ old('email') }}">
                </div>
            </div>
            
            <div class="mb-4">
                <label class="form-label fw-semibold">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="fas fa-lock text-muted"></i></span>
                    <input type="password" name="password" class="form-control border-start-0" placeholder="Masukkan password..." required>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label text-muted" for="remember" style="font-size: 0.875rem;">
                        Ingat Saya
                    </label>
                </div>
                <a href="#" class="text-decoration-none" style="font-size: 0.875rem; color: #0D6E6E;">Lupa Password?</a>
            </div>

            <button type="submit" class="btn-login mb-3">
                <i class="fas fa-sign-in-alt me-2"></i> Masuk ke Sistem
            </button>
        </form>

        <div class="footer-text">
            &copy; 2025 Puskesmas. All rights reserved.
        </div>
    </div>
</div>

<script>
    @if($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Gagal Login',
            text: '{{ $errors->first() }}',
            confirmButtonColor: '#0D6E6E'
        });
    @endif
    
    @if(session('sukses'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session('sukses') }}',
            confirmButtonColor: '#0D6E6E',
            timer: 2000
        });
    @endif
</script>

</body>
</html>
