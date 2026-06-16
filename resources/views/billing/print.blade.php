<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembayaran - {{ $billing->no_invoice }}</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            font-size: 12px;
            margin: 0;
            padding: 10px;
            width: 80mm; /* Lebar kertas kasir standar (80mm) */
            color: #000;
        }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .text-left { text-align: left; }
        .font-bold { font-weight: bold; }
        .mb-1 { margin-bottom: 5px; }
        .mb-2 { margin-bottom: 10px; }
        .mt-2 { margin-top: 10px; }
        .border-top { border-top: 1px dashed #000; }
        .border-bottom { border-bottom: 1px dashed #000; }
        table { width: 100%; border-collapse: collapse; }
        td { padding: 2px 0; vertical-align: top; }
        .item-name { padding-right: 5px; }
        
        @media print {
            body { padding: 0; width: 100%; }
            .no-print { display: none; }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="text-center mb-2">
        <div class="font-bold" style="font-size: 14px;">{{ $config['NAMA_PUSKESMAS'] ?? 'UPTD Puskesmas' }}</div>
        <div>{{ $config['ALAMAT_PUSKESMAS'] ?? 'Jl. Raya No. 1' }}</div>
        <div>{{ $config['EMAIL_PUSKESMAS'] ?? 'info@puskesmas.go.id' }}</div>
    </div>
    
    <div class="border-top border-bottom mb-2 mt-2 py-1">
        <table style="font-size: 11px;">
            <tr>
                <td>Tgl</td><td>:</td><td>{{ \Carbon\Carbon::parse($billing->tanggal)->format('d/m/Y H:i') }}</td>
            </tr>
            <tr>
                <td>No.</td><td>:</td><td>{{ $billing->no_invoice }}</td>
            </tr>
            <tr>
                <td>Pasien</td><td>:</td><td>{{ $billing->pasien->nama }}</td>
            </tr>
            <tr>
                <td>Kasir</td><td>:</td><td>{{ auth()->user()->name ?? 'System' }}</td>
            </tr>
        </table>
    </div>

    <table class="mb-2" style="font-size: 11px;">
        @foreach($billing->items as $item)
        <tr>
            <td colspan="3" class="text-left font-bold">{{ $item->nama_item }}</td>
        </tr>
        <tr>
            <td class="text-left" style="padding-left: 10px;">{{ $item->jumlah }} x</td>
            <td class="text-left">{{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
            <td class="text-right">{{ number_format($item->subtotal, 0, ',', '.') }}</td>
        </tr>
        @endforeach
    </table>

    <div class="border-top pt-1 mt-1 font-bold text-right" style="font-size: 13px;">
        TOTAL: Rp {{ number_format($billing->total_tagihan, 0, ',', '.') }}
    </div>
    <div class="text-right mb-2" style="font-size: 11px;">
        Metode: {{ strtoupper($billing->metode_pembayaran) }}
    </div>

    <div class="text-center mt-2 border-top pt-2">
        <div>TERIMA KASIH</div>
        <div>SEMOGA LEKAS SEMBUH</div>
    </div>

    <div class="text-center mt-2 no-print">
        <button onclick="window.print()" style="padding: 5px 10px; cursor: pointer;">Cetak Ulang</button>
        <button onclick="window.close()" style="padding: 5px 10px; cursor: pointer;">Tutup</button>
    </div>
</body>
</html>
