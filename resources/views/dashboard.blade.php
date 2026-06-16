@extends('layouts.app')

@section('title', 'Dashboard - SIKESAT')

@push('styles')
<style>
    .kpi-card {
        background: #FFFFFF;
        border: 1px solid #E2E8F0;
        border-left: 4px solid var(--teal-primary);
        border-radius: 8px;
        padding: 20px;
        display: flex;
        gap: 16px;
        align-items: flex-start;
        transition: box-shadow 0.2s ease, transform 0.2s ease;
        height: 100%;
    }
    .kpi-card:hover {
        box-shadow: 0 4px 12px rgba(13, 110, 110, 0.12);
        transform: translateY(-2px);
    }
    .kpi-card__icon {
        width: 48px;
        height: 48px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        flex-shrink: 0;
        background-color: var(--teal-bg);
        color: var(--teal-primary);
    }
    .kpi-card__value {
        font-family: 'JetBrains Mono', monospace;
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--text-main);
        display: block;
        line-height: 1.2;
    }
    .kpi-card__label {
        font-size: 0.75rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: var(--text-muted);
        display: block;
        margin-bottom: 4px;
    }
    .kpi-card__sub {
        font-size: 0.8125rem;
        font-weight: 500;
        margin-top: 6px;
        display: inline-block;
    }
</style>
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold text-dark mb-0">Dashboard Eksekutif</h2>
        <p class="text-muted mb-0">Selamat datang kembali, {{ auth()->user()->name }}. Ringkasan data keuangan hari ini.</p>
    </div>
    <div>
        <div class="input-group">
            <span class="input-group-text bg-white"><i class="fas fa-calendar"></i></span>
            <select class="form-select border-start-0" style="width: 150px;">
                <option>Tahun 2025</option>
                <option>Tahun 2024</option>
            </select>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="kpi-card">
            <div class="kpi-card__icon">
                <i class="fas fa-coins"></i>
            </div>
            <div class="kpi-card__body w-100">
                <span class="kpi-card__label">Total Pendapatan</span>
                <span class="kpi-card__value">Rp 1.250 Jt</span>
                <span class="kpi-card__sub text-success">
                    <i class="fas fa-arrow-up"></i> 12.5% vs Q4
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="kpi-card" style="border-left-color: #D4860B;">
            <div class="kpi-card__icon" style="background-color: #FFF3CD; color: #D4860B;">
                <i class="fas fa-file-invoice-dollar"></i>
            </div>
            <div class="kpi-card__body w-100">
                <span class="kpi-card__label">Total Pengeluaran</span>
                <span class="kpi-card__value">Rp 980 Jt</span>
                <div class="progress mt-2" style="height: 4px;">
                    <div class="progress-bar bg-warning" style="width: 78%"></div>
                </div>
                <small class="text-muted mt-1 d-block">78% dari pagu</small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="kpi-card" style="border-left-color: #1A7F5A;">
            <div class="kpi-card__icon" style="background-color: #D4EDDA; color: #1A7F5A;">
                <i class="fas fa-wallet"></i>
            </div>
            <div class="kpi-card__body w-100">
                <span class="kpi-card__label">Sisa Kas Tersedia</span>
                <span class="kpi-card__value">Rp 270 Jt</span>
                <span class="kpi-card__sub text-success">Status Aman</span>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="kpi-card" style="border-left-color: #1565C0;">
            <div class="kpi-card__icon" style="background-color: #DBEAFE; color: #1565C0;">
                <i class="fas fa-user-injured"></i>
            </div>
            <div class="kpi-card__body w-100">
                <span class="kpi-card__label">Kunjungan Pasien</span>
                <span class="kpi-card__value">1,240</span>
                <span class="kpi-card__sub text-primary">Bulan Ini</span>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-header bg-white border-0 pt-4 pb-0 px-4">
                <h6 class="fw-bold mb-0">Trend Pendapatan vs Pengeluaran</h6>
            </div>
            <div class="card-body p-4">
                <canvas id="trendChart" height="100"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-3 h-100">
            <div class="card-header bg-white border-0 pt-4 pb-0 px-4">
                <h6 class="fw-bold mb-0">Komposisi Pengeluaran</h6>
            </div>
            <div class="card-body p-4 d-flex align-items-center justify-content-center">
                <canvas id="pieChart"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx1 = document.getElementById('trendChart').getContext('2d');
    new Chart(ctx1, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            datasets: [{
                label: 'Pendapatan',
                data: [120, 190, 150, 220, 180, 250],
                borderColor: '#0D6E6E',
                backgroundColor: 'rgba(13, 110, 110, 0.1)',
                fill: true,
                tension: 0.4
            }, {
                label: 'Pengeluaran',
                data: [90, 140, 130, 180, 160, 200],
                borderColor: '#D4860B',
                backgroundColor: 'transparent',
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { position: 'top' } },
            scales: { y: { beginAtZero: true } }
        }
    });

    const ctx2 = document.getElementById('pieChart').getContext('2d');
    new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: ['Pegawai', 'Barang Jasa', 'Obat/Alkes'],
            datasets: [{
                data: [45, 25, 30],
                backgroundColor: ['#0D6E6E', '#19A7A7', '#D4860B']
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { position: 'bottom' } }
        }
    });
});
</script>
@endpush
