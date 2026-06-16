@extends('layouts.app')
@section('title', $title)

@push('styles')
<style type="text/css" media="print">
    body { font-size: 11px; }
    .no-print { display: none !important; }
    .card { border: none !important; box-shadow: none !important; }
</style>
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3 no-print">
    <a href="{{ route('laporan.dinkes.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    <button onclick="window.print()" class="btn btn-success"><i class="fas fa-print"></i> Cetak LPLPO</button>
</div>

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <div class="text-center mb-4">
            <h4 class="fw-bold mb-1">LAPORAN LB2 - PEMAKAIAN DAN PERMINTAAN OBAT (LPLPO)</h4>
            <p class="mb-0">Puskesmas Percontohan</p>
            <p class="mb-0">Bulan: {{ \Carbon\Carbon::create()->month($bulan)->translatedFormat('F') }} Tahun: {{ $tahun }}</p>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-success text-center align-middle">
                    <tr>
                        <th width="5%" rowspan="2">No</th>
                        <th width="15%" rowspan="2">Kode Barang</th>
                        <th width="25%" rowspan="2">Nama Obat / Alkes</th>
                        <th width="10%" rowspan="2">Satuan</th>
                        <th colspan="5">Mutasi Persediaan</th>
                    </tr>
                    <tr>
                        <th width="9%">Stok Awal</th>
                        <th width="9%">Penerimaan</th>
                        <th width="9%">Persediaan</th>
                        <th width="9%">Pemakaian</th>
                        <th width="9%">Sisa Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $k => $row)
                    <tr>
                        <td class="text-center">{{ $k+1 }}</td>
                        <td class="text-center">{{ $row->kode_barang }}</td>
                        <td>{{ $row->nama_generik }}</td>
                        <td class="text-center">{{ $row->satuan }}</td>
                        <td class="text-end">{{ number_format($row->stok_awal, 0, ',', '.') }}</td>
                        <td class="text-end text-primary">{{ number_format($row->penerimaan, 0, ',', '.') }}</td>
                        <td class="text-end fw-bold">{{ number_format($row->persediaan, 0, ',', '.') }}</td>
                        <td class="text-end text-danger">{{ number_format($row->pemakaian, 0, ',', '.') }}</td>
                        <td class="text-end fw-bold text-success">{{ number_format($row->sisa_stok, 0, ',', '.') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center text-muted">Tidak ada data obat.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
