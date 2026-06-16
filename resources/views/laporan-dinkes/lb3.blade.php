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
            <h4 class="fw-bold mb-1">LAPORAN LB3 - GIZI, KIA, KB, DAN IMUNISASI</h4>
            <p class="mb-0">Puskesmas Percontohan</p>
            <p class="mb-0">Bulan: {{ \Carbon\Carbon::create()->month((int) $bulan)->translatedFormat('F') }} Tahun: {{ $tahun }}</p>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-info text-center align-middle">
                    <tr>
                        <th width="10%">No</th>
                        <th width="50%">Indikator Kegiatan Program</th>
                        <th width="20%">Target Sasaran</th>
                        <th width="20%">Pencapaian Bulan Ini</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $k => $row)
                    <tr>
                        <td class="text-center">{{ $k+1 }}</td>
                        <td>{{ $row->indikator }}</td>
                        <td class="text-center">{{ $row->target }}</td>
                        <td class="text-center fw-bold text-success">{{ $row->pencapaian }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
