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
            <h4 class="fw-bold mb-1">LAPORAN LB4 - KEGIATAN KUNJUNGAN PUSKESMAS</h4>
            <p class="mb-0">Puskesmas Percontohan</p>
            <p class="mb-0">Bulan: {{ \Carbon\Carbon::create()->month($bulan)->translatedFormat('F') }} Tahun: {{ $tahun }}</p>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-warning text-center align-middle">
                    <tr>
                        <th width="5%" rowspan="2">No</th>
                        <th width="35%" rowspan="2">Unit Pelayanan (Poli)</th>
                        <th colspan="3">Jenis Pasien</th>
                        <th width="15%" rowspan="2">Total Kunjungan</th>
                    </tr>
                    <tr>
                        <th width="15%">Umum</th>
                        <th width="15%">BPJS</th>
                        <th width="15%">Gratis</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sumUmum = 0; $sumBpjs = 0; $sumGratis = 0; $sumTotal = 0;
                    @endphp
                    @forelse($data as $k => $row)
                        @php
                            $sumUmum += $row->total_umum;
                            $sumBpjs += $row->total_bpjs;
                            $sumGratis += $row->total_gratis;
                            $sumTotal += $row->grand_total;
                        @endphp
                    <tr>
                        <td class="text-center">{{ $k+1 }}</td>
                        <td>{{ $row->unit->nama ?? 'Unit Tidak Diketahui' }}</td>
                        <td class="text-center">{{ number_format($row->total_umum, 0, ',', '.') }}</td>
                        <td class="text-center">{{ number_format($row->total_bpjs, 0, ',', '.') }}</td>
                        <td class="text-center">{{ number_format($row->total_gratis, 0, ',', '.') }}</td>
                        <td class="text-center fw-bold">{{ number_format($row->grand_total, 0, ',', '.') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Tidak ada data kunjungan bulan ini.</td>
                    </tr>
                    @endforelse
                </tbody>
                @if(count($data) > 0)
                <tfoot class="table-light fw-bold text-center">
                    <tr>
                        <td colspan="2" class="text-end">TOTAL KESELURUHAN:</td>
                        <td>{{ number_format($sumUmum, 0, ',', '.') }}</td>
                        <td>{{ number_format($sumBpjs, 0, ',', '.') }}</td>
                        <td>{{ number_format($sumGratis, 0, ',', '.') }}</td>
                        <td class="text-success fs-6">{{ number_format($sumTotal, 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
                @endif
            </table>
        </div>
    </div>
</div>
@endsection
