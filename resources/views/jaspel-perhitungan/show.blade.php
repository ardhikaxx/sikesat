@extends('layouts.app')
@section('title', 'Detail JaspelPerhitungan - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-money-check-alt"></i> Detail Perhitungan Jaspel</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route('jaspel-perhitungan.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <div class="row mb-4">
            <div class="col-md-6">
                <table class="table table-borderless table-sm">
                    <tr><th width="40%">Bulan / Tahun</th><td>: {{ \Carbon\Carbon::create()->month($data->periode_bulan)->translatedFormat('F') }} {{ $data->periode_tahun }}</td></tr>
                    <tr><th>Sumber Dana</th><td>: <span class="badge bg-primary">{{ $data->sumber_dana }}</span></td></tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-borderless table-sm">
                    <tr><th width="40%">Total Dana Alokasi</th><td class="fw-bold text-success">: Rp {{ number_format($data->total_dana, 0, ',', '.') }}</td></tr>
                    <tr><th>Status Jaspel</th><td>: <span class="badge bg-secondary text-uppercase">{{ $data->status }}</span></td></tr>
                </table>
            </div>
        </div>

        <h5 class="fw-bold border-bottom pb-2 mb-3">Distribusi per Pegawai (Berdasarkan Skor / Poin)</h5>
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th width="5%">No</th>
                        <th width="35%">Nama Pegawai</th>
                        <th width="20%">Jabatan & Tipe</th>
                        <th width="15%">Poin / Skor</th>
                        <th width="25%" class="text-end">Nominal Diterima</th>
                    </tr>
                </thead>
                <tbody>
                    @php $totalDistribusi = 0; @endphp
                    @forelse($details as $k => $d)
                        @php $totalDistribusi += $d->nominal_diterima; @endphp
                        <tr>
                            <td class="text-center">{{ $k+1 }}</td>
                            <td class="fw-semibold">{{ $d->nama }}</td>
                            <td>
                                {{ $d->jabatan }}<br>
                                <small class="text-muted border rounded px-1">{{ $d->jenis_pegawai }}</small>
                            </td>
                            <td class="text-center fw-bold text-primary">{{ $d->skor_total }}</td>
                            <td class="text-end fw-bold text-success">Rp {{ number_format($d->nominal_diterima, 0, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data distribusi / simulasi gagal.</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot class="table-light fw-bold text-end">
                    <tr>
                        <td colspan="4">TOTAL DISTRIBUSI:</td>
                        <td class="text-success">Rp {{ number_format($totalDistribusi, 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection