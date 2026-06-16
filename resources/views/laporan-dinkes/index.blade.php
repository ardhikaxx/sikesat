@extends('layouts.app')
@section('title', 'Generator Laporan Dinkes (LB1-LB4) - SIKESAT')

@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-chart-line"></i> Generator Laporan Dinkes</h1>
        <p class="text-muted mb-0">Cetak laporan rutin puskesmas (LB1, LB2, LB3, LB4) sesuai format Dinas Kesehatan.</p>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-4">
                <form action="{{ route('laporan.dinkes.generate') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Pilih Jenis Laporan</label>
                        <select name="jenis_laporan" class="form-select" required>
                            <option value="">-- Pilih Laporan --</option>
                            <option value="LB1">LB1 - Laporan Data Kesakitan (Morbiditas)</option>
                            <option value="LB2">LB2 - Laporan Pemakaian & Permintaan Obat (LPLPO)</option>
                            <option value="LB3">LB3 - Laporan Gizi, KIA, KB, Imunisasi</option>
                            <option value="LB4">LB4 - Laporan Kegiatan Puskesmas (Kunjungan)</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-semibold">Bulan</label>
                            <select name="bulan" class="form-select" required>
                                @for($i=1; $i<=12; $i++)
                                    <option value="{{ $i }}" {{ date('n') == $i ? 'selected' : '' }}>{{ \Carbon\Carbon::create()->month($i)->translatedFormat('F') }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-semibold">Tahun</label>
                            <select name="tahun" class="form-select" required>
                                @for($y=date('Y'); $y>=2020; $y--)
                                    <option value="{{ $y }}">{{ $y }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2"><i class="fas fa-cogs"></i> Generate Laporan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
