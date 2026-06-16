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
        <form method="GET" action="{{ route('dashboard') }}" class="input-group">
            <span class="input-group-text bg-white"><i class="fas fa-calendar"></i></span>
            <select name="year" class="form-select border-start-0" style="width: 150px;" onchange="this.form.submit()">
                <option value="2026" {{ $year == '2026' ? 'selected' : '' }}>Tahun 2026</option>
                <option value="2025" {{ $year == '2025' ? 'selected' : '' }}>Tahun 2025</option>
                <option value="2024" {{ $year == '2024' ? 'selected' : '' }}>Tahun 2024</option>
            </select>
        </form>
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
                <span class="kpi-card__value">Rp {{ number_format($totalPendapatan / 1000000, 1, ',', '.') }} Jt</span>
                <span class="kpi-card__sub text-success">
                    <i class="fas fa-check-circle"></i> Terealisasi
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
                <span class="kpi-card__value">Rp {{ number_format($totalPengeluaran / 1000000, 1, ',', '.') }} Jt</span>
                <div class="progress mt-2" style="height: 4px;">
                    <div class="progress-bar bg-warning" style="width: {{ $totalPendapatan > 0 ? min(($totalPengeluaran/$totalPendapatan)*100, 100) : 0 }}%"></div>
                </div>
                <small class="text-muted mt-1 d-block">{{ $totalPendapatan > 0 ? round(($totalPengeluaran/$totalPendapatan)*100, 1) : 0 }}% thd Pendapatan</small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="kpi-card" style="border-left-color: #1A7F5A;">
            <div class="kpi-card__icon" style="background-color: #D4EDDA; color: #1A7F5A;">
                <i class="fas fa-wallet"></i>
            </div>
            <div class="kpi-card__body w-100">
                <span class="kpi-card__label">Sisa Kas BLUD</span>
                <span class="kpi-card__value">Rp {{ number_format($sisaKas / 1000000, 1, ',', '.') }} Jt</span>
                <span class="kpi-card__sub text-success">Surplus / Defisit</span>
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
                <span class="kpi-card__value">{{ number_format($totalKunjungan) }}</span>
                <span class="kpi-card__sub text-primary">Tahun {{ $year }}</span>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    @if(count($stokMenipis) > 0)
    <div class="col-12">
        <div class="alert alert-warning border-0 shadow-sm d-flex align-items-center mb-0" role="alert">
            <i class="fas fa-exclamation-triangle fa-2x me-3 text-warning"></i>
            <div>
                <h6 class="fw-bold mb-1">Peringatan: Stok Obat/Alkes Menipis!</h6>
                <p class="mb-0 text-dark" style="font-size: 0.875rem;">Ada {{ count($stokMenipis) }} item yang mencapai batas stok minimum. Segera lakukan pengadaan untuk: 
                    <strong>{{ implode(', ', $stokMenipis->pluck('nama_generik')->toArray()) }}</strong>.
                </p>
            </div>
        </div>
    </div>
    @endif
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
    const trendPendapatan = {!! json_encode(array_values($trendPendapatan)) !!};
    const trendPengeluaran = {!! json_encode(array_values($trendPengeluaran)) !!};

    const ctx1 = document.getElementById('trendChart').getContext('2d');
    new Chart(ctx1, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Pendapatan',
                data: trendPendapatan,
                borderColor: '#0D6E6E',
                backgroundColor: 'rgba(13, 110, 110, 0.1)',
                fill: true,
                tension: 0.4
            }, {
                label: 'Pengeluaran',
                data: trendPengeluaran,
                borderColor: '#D4860B',
                backgroundColor: 'transparent',
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: { 
                legend: { position: 'top' },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) { label += ': '; }
                            if (context.parsed.y !== null) {
                                label += new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(context.parsed.y);
                            }
                            return label;
                        }
                    }
                }
            },
            scales: { 
                y: { 
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) { return 'Rp ' + (value / 1000000) + ' Jt'; }
                    }
                } 
            }
        }
    });

    const pieLabels = {!! json_encode($pieLabels) !!};
    const pieData = {!! json_encode($pieData) !!};
    const bgColors = ['#0D6E6E', '#19A7A7', '#D4860B', '#1565C0', '#1A7F5A', '#DC2626', '#8B5CF6'];

    const ctx2 = document.getElementById('pieChart').getContext('2d');
    new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: pieLabels,
            datasets: [{
                data: pieData,
                backgroundColor: bgColors.slice(0, pieLabels.length)
            }]
        },
        options: {
            responsive: true,
            plugins: { 
                legend: { position: 'bottom' },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            if (label) { label += ': '; }
                            if (context.parsed !== null) {
                                label += new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(context.parsed);
                            }
                            return label;
                        }
                    }
                }
            }
        }
    });
});
</script>
@endpush
