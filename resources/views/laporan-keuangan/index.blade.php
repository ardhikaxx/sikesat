@extends('layouts.app')

@section('title', 'Laporan Keuangan BLUD - SIKESAT')

@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-file-invoice"></i> Cetak Laporan Keuangan BLUD</h1>
        <p class="text-muted mb-0">Hasilkan LRA, LO, Neraca, dan Laporan Arus Kas sesuai standar pedoman BLUD.</p>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-4">
                <form action="{{ route('laporan-keuangan.generate') }}" method="GET" target="_blank">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Jenis Laporan</label>
                        <select name="jenis_laporan" class="form-select" required>
                            <option value="">-- Pilih Jenis Laporan --</option>
                            <option value="LRA">Laporan Realisasi Anggaran (LRA)</option>
                            <option value="LO">Laporan Operasional (LO)</option>
                            <option value="NERACA">Neraca</option>
                            <option value="LAK">Laporan Arus Kas (LAK)</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Tahun Anggaran</label>
                        <select name="tahun" class="form-select" required>
                            @foreach($years as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                            @if($years->isEmpty())
                                <option value="{{ date('Y') }}">{{ date('Y') }}</option>
                            @endif
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Format Cetak</label>
                        <div class="d-flex gap-3 mt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="format" id="f_html" value="html" checked>
                                <label class="form-check-label" for="f_html"><i class="fas fa-desktop text-primary"></i> Preview Web</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="format" id="f_pdf" value="pdf">
                                <label class="form-check-label" for="f_pdf"><i class="fas fa-file-pdf text-danger"></i> Unduh PDF</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="format" id="f_excel" value="excel">
                                <label class="form-check-label" for="f_excel"><i class="fas fa-file-excel text-success"></i> Unduh Excel</label>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary px-4"><i class="fas fa-print"></i> Generate Laporan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="alert alert-info border-0 shadow-sm">
            <h6 class="fw-bold"><i class="fas fa-info-circle"></i> Informasi Laporan</h6>
            <ul class="mb-0 mt-2 text-dark" style="font-size: 0.875rem;">
                <li class="mb-1"><strong>LRA:</strong> Membandingkan target Rencana Bisnis Anggaran (RBA) dengan Realisasi yang terjadi selama tahun berjalan.</li>
                <li class="mb-1"><strong>LO:</strong> Menyajikan informasi mengenai seluruh kegiatan operasional keuangan (Pendapatan vs Beban).</li>
                <li class="mb-1"><strong>Neraca:</strong> Menampilkan posisi Aset, Kewajiban, dan Ekuitas pada akhir tahun pelaporan.</li>
                <li><strong>LAK:</strong> Menggambarkan ringkasan arus kas masuk dan kas keluar.</li>
            </ul>
        </div>
    </div>
</div>
@endsection
