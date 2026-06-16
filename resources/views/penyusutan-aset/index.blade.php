@extends('layouts.app')
@section('title', 'Penyusutan Aset - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-chart-line"></i> Penyusutan Aset Otomatis</h1>
        <p class="text-muted mb-0">Manajemen depresiasi nilai buku aset per bulan.</p>
    </div>
    <div class="page-header__actions">
        <form action="{{ route('penyusutan-aset.generate') }}" method="POST" class="d-inline" onsubmit="return confirm('Proses ini akan menghitung penyusutan untuk semua aset aktif di bulan ini. Lanjutkan?')">
            @csrf
            <button type="submit" class="btn-primary-sikesat"><i class="fas fa-magic"></i> Hitung Penyusutan Bulan Ini</button>
        </form>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success border-0 shadow-sm"><i class="fas fa-check-circle me-2"></i> {{ session('success') }}</div>
@endif

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table sikesat-table" id="dataTable">
                <thead>
                    <tr>
                        <th>Bulan/Tahun</th>
                        <th>Nama Aset</th>
                        <th class="text-end">Nilai Perolehan</th>
                        <th class="text-end">Penyusutan Bln Ini</th>
                        <th class="text-end">Akumulasi</th>
                        <th class="text-end">Nilai Buku Skrg</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td class="fw-bold">{{ str_pad($item->periode_bulan, 2, '0', STR_PAD_LEFT) }} / {{ $item->periode_tahun }}</td>
                        <td>{{ $item->aset ? $item->aset->nama_aset : 'Aset Dihapus' }}</td>
                        <td class="text-end">Rp {{ $item->aset ? number_format($item->aset->nilai_perolehan, 0, ',', '.') : 0 }}</td>
                        <td class="text-end text-danger fw-semibold">- Rp {{ number_format($item->nilai_penyusutan, 0, ',', '.') }}</td>
                        <td class="text-end text-warning text-dark">Rp {{ number_format($item->akumulasi_penyusutan, 0, ',', '.') }}</td>
                        <td class="text-end fw-bold text-success">Rp {{ number_format($item->nilai_buku_sesudah, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection