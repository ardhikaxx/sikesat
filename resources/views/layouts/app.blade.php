<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIKESAT Dashboard')</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <!-- DataTables -->
    <link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <!-- Flatpickr -->
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Noto+Serif:wght@400;700&family=JetBrains+Mono:wght@400;500&display=swap');

        :root {
            --teal-primary: #0D6E6E;
            --teal-light: #19A7A7;
            --teal-bg: #E8F5F5;
            --navy-dark: #0B3D3D;
            --text-main: #2D3748;
            --text-muted: #718096;
            --bg-body: #F7FAFC;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            overflow-x: hidden;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 260px;
            background-color: #FFFFFF;
            border-right: 1px solid #E2E8F0;
            z-index: 1000;
            transition: all 0.3s ease;
            overflow-y: auto;
        }
        .sidebar-header {
            height: 64px;
            background-color: var(--teal-primary);
            color: white;
            display: flex;
            align-items: center;
            padding: 0 20px;
            font-family: 'Noto Serif', serif;
            font-weight: 700;
            font-size: 1.25rem;
            gap: 10px;
        }
        .nav-item-link {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: var(--text-main);
            text-decoration: none;
            font-weight: 500;
            transition: background 0.2s, color 0.2s;
            gap: 12px;
        }
        .nav-item-link:hover, .nav-item-link.active {
            background-color: var(--teal-bg);
            color: var(--teal-primary);
        }
        .nav-item-link i {
            width: 20px;
            text-align: center;
            font-size: 1.1rem;
        }
        
        /* Top Header */
        .top-header {
            position: fixed;
            top: 0;
            left: 260px;
            right: 0;
            height: 64px;
            background-color: #FFFFFF;
            border-bottom: 1px solid #E2E8F0;
            z-index: 999;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 24px;
        }

        /* Main Content */
        .main-content {
            margin-top: 64px;
            margin-left: 260px;
            padding: 24px;
            min-height: calc(100vh - 64px);
        }

        /* Page Header */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 20px 24px;
            background: #FFFFFF;
            border-bottom: 1px solid #E2E8F0;
            border-radius: 8px;
            margin-bottom: 24px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.02);
        }
        .page-header__title {
            font-family: 'Noto Serif', serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--navy-dark);
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0 0 4px;
        }
        .page-header__title i {
            color: var(--teal-primary);
        }

        .btn-primary-sikesat {
            background: var(--teal-primary);
            border: none;
            color: #FFFFFF;
            padding: 8px 20px;
            border-radius: 6px;
            font-size: 0.875rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s ease;
        }
        .btn-primary-sikesat:hover {
            background: #0B5C5C;
            color: white;
            transform: translateY(-1px);
        }

        @media (max-width: 991.98px) {
            .sidebar { transform: translateX(-100%); }
            .top-header { left: 0; }
            .main-content { margin-left: 0; }
        }

        /* Global Table Styles (from RBA) */
        .sikesat-table thead th { background: var(--teal-primary); color: #FFFFFF; font-size: 0.8125rem; font-weight: 600; text-transform: uppercase; padding: 12px 16px; border: none; }
        .sikesat-table tbody td { font-size: 0.875rem; padding: 10px 16px; vertical-align: middle; border-bottom: 1px solid #EDF2F7; }
        .sikesat-table tbody tr:hover { background: var(--teal-bg); }
        .badge-status { display: inline-flex; align-items: center; gap: 4px; padding: 4px 10px; border-radius: 20px; font-size: 0.75rem; font-weight: 600; }
        .badge-status::before { content: '●'; font-size: 0.5rem; }
        .badge-status--draft { background: #EDF2F7; color: #718096; }
        .badge-status--disahkan { background: #D4EDDA; color: #1A7F5A; }
        .btn-action { width: 32px; height: 32px; border-radius: 6px; border: 1px solid; display: inline-flex; align-items: center; justify-content: center; text-decoration: none; }
        .btn-action-view { border-color: #1565C0; color: #1565C0; background: #DBEAFE; }
        .btn-action-edit { border-color: #D97706; color: #D97706; background: #FEF3C7; }
        .btn-action-delete { border-color: #DC2626; color: #DC2626; background: #FEE2E2; }
    </style>
    @stack('styles')
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <i class="fas fa-hospital-user"></i> SIKESAT
        </div>
        <div class="py-3">
            <a href="{{ route('dashboard') }}" class="nav-item-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-pie"></i> Dashboard
            </a>
            
            <div class="px-3 py-2 text-muted fw-bold" style="font-size: 0.75rem; text-transform: uppercase;">Transaksi</div>
            
            <a href="{{ route('penerimaan.index') }}" class="nav-item-link {{ request()->routeIs('penerimaan.*') ? 'active' : '' }}">
                <i class="fas fa-wallet"></i> Penerimaan
            </a>
            <a href="{{ route('pengeluaran.index') }}" class="nav-item-link {{ request()->routeIs('pengeluaran.*') ? 'active' : '' }}">
                <i class="fas fa-file-invoice-dollar"></i> Pengeluaran
            </a>
            <a href="{{ route('jaspel-perhitungan.index') }}" class="nav-item-link {{ request()->routeIs('jaspel-*') ? 'active' : '' }}">
                <i class="fas fa-hand-holding-medical"></i> Jasa Pelayanan
            </a>
            <a href="{{ route('jurnal.index') }}" class="nav-item-link {{ request()->routeIs('jurnal.*') ? 'active' : '' }}">
                <i class="fas fa-book"></i> Akuntansi & Jurnal
            </a>
            <a href="{{ route('rba.index') }}" class="nav-item-link {{ request()->routeIs('rba.*') ? 'active' : '' }}">
                <i class="fas fa-chart-line"></i> RBA & Anggaran
            </a>
            <a href="{{ route('mutu.index') }}" class="nav-item-link {{ request()->routeIs('mutu.*') ? 'active' : '' }}">
                <i class="fas fa-heartbeat"></i> Mutu Layanan
            </a>
            <a href="{{ route('spm-indikator.index') }}" class="nav-item-link {{ request()->routeIs('spm-*') ? 'active' : '' }}">
                <i class="fas fa-chart-line"></i> Kinerja BLUD (SPM)
            </a>

            <div class="px-3 py-2 text-muted fw-bold mt-2" style="font-size: 0.75rem; text-transform: uppercase;">Master Data</div>
            <a href="{{ route('obat.index') }}" class="nav-item-link {{ request()->routeIs('obat.*') ? 'active' : '' }}">
                <i class="fas fa-pills"></i> Obat & Alkes
            </a>
            <a href="{{ route('akun-akuntansi.index') }}" class="nav-item-link {{ request()->routeIs('akun-akuntansi.*') ? 'active' : '' }}">
                <i class="fas fa-file-invoice"></i> Chart of Account
            </a>
            <a href="{{ route('pegawai.index') }}" class="nav-item-link {{ request()->routeIs('pegawai.*') ? 'active' : '' }}">
                <i class="fas fa-users"></i> Pegawai
            </a>
            <a href="{{ route('unit-pelayanan.index') }}" class="nav-item-link {{ request()->routeIs('unit-pelayanan.*') ? 'active' : '' }}">
                <i class="fas fa-sitemap"></i> Unit Pelayanan
            </a>
            <a href="{{ route('supplier.index') }}" class="nav-item-link {{ request()->routeIs('supplier.*') ? 'active' : '' }}">
                <i class="fas fa-truck"></i> Supplier
            </a>
            <a href="{{ route('aset.index') }}" class="nav-item-link {{ request()->routeIs('aset.*') ? 'active' : '' }}">
                <i class="fas fa-desktop"></i> Inventaris Aset
            </a>

            <div class="px-3 py-2 text-muted fw-bold mt-2" style="font-size: 0.75rem; text-transform: uppercase;">Pengaturan</div>
            <a href="{{ route('user.index') }}" class="nav-item-link {{ request()->routeIs('user.*') ? 'active' : '' }}">
                <i class="fas fa-users-cog"></i> Hak Akses & User
            </a>
        </div>
    </div>

    <!-- Top Header -->
    <header class="top-header">
        <div>
            <!-- Breadcrumb can go here -->
        </div>
        <div class="d-flex align-items-center gap-3">
            <div class="dropdown">
                <a href="#" class="text-decoration-none text-dark fw-semibold dropdown-toggle" data-bs-toggle="dropdown">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=0D6E6E&color=fff" class="rounded-circle me-2" width="32" height="32">
                    {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end border-0 shadow">
                    <li><a class="dropdown-item" href="#"><i class="fas fa-user fa-fw text-muted me-2"></i> Profil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="fas fa-sign-out-alt fa-fw me-2"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        const SikeAlert = {
            sukses: (pesan, callback) => {
                return Swal.fire({
                    icon: 'success', title: 'Berhasil!', text: pesan,
                    confirmButtonColor: '#0D6E6E', timer: 3000, timerProgressBar: true,
                }).then(callback || function(){});
            },
            gagal: (pesan) => {
                return Swal.fire({
                    icon: 'error', title: 'Gagal!', text: pesan, confirmButtonColor: '#C0392B',
                });
            }
        };

        @if(session('sukses'))
            SikeAlert.sukses('{{ session('sukses') }}');
        @endif

        @if(session('gagal') || session('error'))
            SikeAlert.gagal('{{ session('gagal') ?? session('error') }}');
        @endif

        $(document).ready(function() {
            $('.sikesat-table').each(function() {
                if (!$.fn.DataTable.isDataTable(this)) {
                    $(this).DataTable({
                        language: { url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json' }
                    });
                }
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
