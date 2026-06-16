@extends('layouts.app')
@section('title', 'Detail Tagihan - SIKESAT')
@section('content')
<div class="page-header">
    <div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-receipt"></i> Detail & Pembayaran Tagihan</h1>
    </div>
    <div class="page-header__actions d-flex gap-2">
        <a href="{{ route('billing.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        <button class="btn btn-primary" onclick="window.print()"><i class="fas fa-print"></i> Cetak Struk</button>
    </div>
</div>

@if(session('error'))
<div class="alert alert-danger border-0 shadow-sm"><i class="fas fa-times-circle me-2"></i> {{ session('error') }}</div>
@endif

@if(session('success'))
<div class="alert alert-success border-0 shadow-sm"><i class="fas fa-check-circle me-2"></i> {{ session('success') }}</div>
@endif

<div class="row g-4">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-4 print-area">
                <!-- Header Invoice -->
                <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
                    <div>
                        <h4 class="fw-bold mb-0 text-primary">KLINIK SIKESAT BLUD</h4>
                        <p class="text-muted mb-0 small">Jl. Sehat Selalu No. 123, Kota Medika</p>
                    </div>
                    <div class="text-end">
                        <h5 class="fw-bold mb-1">INVOICE</h5>
                        <p class="text-muted mb-0 fw-semibold">{{ $billing->no_invoice }}</p>
                    </div>
                </div>

                <!-- Info Pasien -->
                <div class="row mb-4">
                    <div class="col-6">
                        <h6 class="fw-bold text-muted mb-2">DITAGIHKAN KEPADA:</h6>
                        <h6 class="fw-bold mb-1">{{ $billing->pasien->nama_lengkap }}</h6>
                        <p class="mb-0 small">No RM: {{ $billing->pasien->no_rm }}</p>
                        <p class="mb-0 small">Alamat: {{ $billing->pasien->alamat }}</p>
                    </div>
                    <div class="col-6 text-end">
                        <h6 class="fw-bold text-muted mb-2">INFO TAGIHAN:</h6>
                        <p class="mb-1 small">Tanggal: <strong>{{ \Carbon\Carbon::parse($billing->tanggal)->format('d/m/Y') }}</strong></p>
                        <p class="mb-0 small">Status: 
                            @if($billing->status == 'Lunas')
                                <span class="badge bg-success">LUNAS</span>
                            @else
                                <span class="badge bg-danger">BELUM BAYAR</span>
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Tabel Item -->
                <table class="table table-bordered mb-4">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Deskripsi Tindakan/Obat</th>
                            <th class="text-center">Qty</th>
                            <th class="text-end">Harga</th>
                            <th class="text-end">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($billing->items as $idx => $item)
                        <tr>
                            <td>{{ $idx + 1 }}</td>
                            <td>
                                <div class="fw-semibold">{{ $item->nama_item }}</div>
                                <div class="text-muted" style="font-size: 0.7rem;">{{ $item->jenis_item }}</div>
                            </td>
                            <td class="text-center">{{ $item->jumlah }}</td>
                            <td class="text-end">Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                            <td class="text-end fw-bold">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-end fw-bold">GRAND TOTAL</td>
                            <td class="text-end fw-bold fs-5 text-primary">Rp {{ number_format($billing->total_tagihan, 0, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>

                <div class="text-center mt-5">
                    <p class="mb-1 small text-muted">Terima kasih atas kunjungan Anda.</p>
                    <p class="small text-muted">Semoga lekas sembuh.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Panel Pembayaran -->
    <div class="col-md-4 d-print-none">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-header bg-white border-0 pt-4 pb-0 px-4">
                <h6 class="fw-bold mb-0">Pembayaran Kasir</h6>
            </div>
            <div class="card-body p-4">
                @if($billing->status == 'Lunas')
                    <div class="alert alert-success border-0 text-center">
                        <i class="fas fa-check-circle fa-3x mb-3 mt-2"></i>
                        <h5 class="fw-bold">Telah Lunas</h5>
                        <p class="mb-0">Metode: {{ $billing->metode_pembayaran }}</p>
                        @if($billing->penerimaan_kas)
                        <hr>
                        <small>No Bukti Kas: {{ $billing->penerimaan_kas->nomor_bukti }}</small>
                        @endif
                    </div>
                @else
                    <form action="{{ route('billing.pay', $billing->id) }}" method="POST" onsubmit="return confirm('Proses pembayaran ini akan memasukkan uang ke Kas dan memotong stok Obat secara otomatis. Lanjutkan?')">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label text-muted fw-semibold small">Total Harus Dibayar</label>
                            <h3 class="fw-bold text-danger">Rp {{ number_format($billing->total_tagihan, 0, ',', '.') }}</h3>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Metode Pembayaran <span class="text-danger">*</span></label>
                            <select name="metode_pembayaran" class="form-select" required>
                                <option value="Tunai">Tunai / Cash</option>
                                <option value="Transfer Bank">Transfer Bank</option>
                                <option value="QRIS">QRIS</option>
                                <option value="Kartu Debit/Kredit">Kartu Debit/Kredit</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Uang Diterima (Opsional)</label>
                            <input type="number" class="form-control" id="uangDiterima" placeholder="0" oninput="hitungKembalian()">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Kembalian</label>
                            <input type="text" class="form-control fw-bold text-success" id="uangKembalian" readonly value="Rp 0">
                        </div>
                        <button type="submit" class="btn btn-success w-100 py-2 fw-bold"><i class="fas fa-hand-holding-usd"></i> PROSES PEMBAYARAN</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<style>
    @media print {
        body * { visibility: hidden; }
        .print-area, .print-area * { visibility: visible; }
        .print-area { position: absolute; left: 0; top: 0; width: 100%; }
        .page-header, .d-print-none { display: none !important; }
    }
</style>
<script>
    const totalTagihan = {{ $billing->total_tagihan }};
    function hitungKembalian() {
        const diterima = document.getElementById('uangDiterima').value;
        if(diterima && diterima > 0) {
            const kembali = diterima - totalTagihan;
            if(kembali >= 0) {
                document.getElementById('uangKembalian').value = 'Rp ' + new Intl.NumberFormat('id-ID').format(kembali);
                document.getElementById('uangKembalian').classList.remove('text-danger');
                document.getElementById('uangKembalian').classList.add('text-success');
            } else {
                document.getElementById('uangKembalian').value = 'Kurang Rp ' + new Intl.NumberFormat('id-ID').format(Math.abs(kembali));
                document.getElementById('uangKembalian').classList.remove('text-success');
                document.getElementById('uangKembalian').classList.add('text-danger');
            }
        } else {
            document.getElementById('uangKembalian').value = 'Rp 0';
        }
    }
</script>
@endpush
