@extends('layouts.app')
@section('title', $title)

@push('styles')
<style type="text/css" media="print">
    body { font-size: 12px; }
    .no-print { display: none !important; }
    .card { border: none !important; box-shadow: none !important; }
</style>
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3 no-print">
    <a href="{{ route('laporan.dinkes.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    <button onclick="window.print()" class="btn btn-success"><i class="fas fa-print"></i> Cetak Laporan</button>
</div>

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <div class="text-center mb-4">
            <h4 class="fw-bold mb-1">LAPORAN LB1 - DATA KESAKITAN (MORBIDITAS)</h4>
            <p class="mb-0">Puskesmas Percontohan</p>
            <p class="mb-0">Bulan: {{ \Carbon\Carbon::create()->month((int) $bulan)->translatedFormat('F') }} Tahun: {{ $tahun }}</p>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th width="5%" rowspan="2" class="align-middle">No</th>
                        <th width="45%" rowspan="2" class="align-middle">Nama Penyakit (Simulasi Tindakan)</th>
                        <th colspan="2">Jumlah Kasus Berdasarkan Penjamin</th>
                        <th width="15%" rowspan="2" class="align-middle">Total Kasus</th>
                    </tr>
                    <tr>
                        <th width="17.5%">BPJS</th>
                        <th width="17.5%">Umum / Gratis</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $k => $row)
                    <tr>
                        <td class="text-center">{{ $k+1 }}</td>
                        <td>{{ $row->penyakit }}</td>
                        <td class="text-center">{{ $row->jumlah_bpjs }}</td>
                        <td class="text-center">{{ $row->jumlah_umum }}</td>
                        <td class="text-center fw-bold">{{ $row->total_kasus }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Tidak ada data kunjungan sakit pada bulan ini.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
