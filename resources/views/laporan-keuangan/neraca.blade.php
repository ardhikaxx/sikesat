<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }} - {{ $tahun }}</title>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; color: #333; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #333; padding-bottom: 10px; }
        .title { font-size: 16px; font-weight: bold; margin: 0; text-transform: uppercase; }
        .subtitle { font-size: 14px; margin: 5px 0 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; font-weight: bold; text-align: center; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .font-bold { font-weight: bold; }
        .bg-light { background-color: #f9f9f9; }
        .signature { margin-top: 50px; width: 100%; }
        .signature td { border: none; text-align: center; width: 50%; padding: 20px; }
    </style>
</head>
<body>
    <div class="header">
        <p style="margin:0; font-weight:bold; font-size: 14px;">PEMERINTAH DAERAH KABUPATEN/KOTA</p>
        <p style="margin:0; font-weight:bold; font-size: 18px;">PUSKESMAS / RSUD BLUD SIKESAT</p>
        <p style="margin:0; font-size: 11px;">Jl. Kesehatan No. 123, Telepon: (021) 1234567</p>
    </div>

    <div style="text-align: center; margin-bottom: 20px;">
        <p class="title">{{ $title }}</p>
        <p class="subtitle">Per 31 Desember {{ $tahun }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th width="20%">KODE REKENING</th>
                <th width="50%">URAIAN</th>
                <th width="30%">JUMLAH (Rp)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="3" class="font-bold bg-light">ASET</td>
            </tr>
            @foreach($data['aset'] as $p)
            <tr>
                <td class="text-center">{{ $p->kode_akun }}</td>
                <td>{{ $p->nama_akun }}</td>
                <td class="text-right">0,00</td>
            </tr>
            @endforeach

            <tr>
                <td colspan="3" class="font-bold bg-light">KEWAJIBAN</td>
            </tr>
            @foreach($data['kewajiban'] as $p)
            <tr>
                <td class="text-center">{{ $p->kode_akun }}</td>
                <td>{{ $p->nama_akun }}</td>
                <td class="text-right">0,00</td>
            </tr>
            @endforeach
            
            <tr>
                <td colspan="3" class="font-bold bg-light">EKUITAS</td>
            </tr>
            @foreach($data['ekuitas'] as $p)
            <tr>
                <td class="text-center">{{ $p->kode_akun }}</td>
                <td>{{ $p->nama_akun }}</td>
                <td class="text-right">0,00</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table class="signature">
        <tr>
            <td></td>
            <td>
                <p>Kota SIKESAT, 31 Desember {{ $tahun }}</p>
                <p>Pemimpin BLUD</p>
                <br><br><br>
                <p class="font-bold" style="text-decoration: underline;">dr. H. Wahyu Hartono, M.Kes</p>
                <p>NIP. 197502122001121003</p>
            </td>
        </tr>
    </table>

    @if($format === 'html')
    <div style="text-align: center; margin-top: 30px;">
        <button onclick="window.close()" style="padding: 10px 20px; cursor: pointer;">Tutup Preview</button>
    </div>
    @endif
</body>
</html>
