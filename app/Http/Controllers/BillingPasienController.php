<?php

namespace App\Http\Controllers;

use App\Models\BillingPasien;
use App\Models\StokGudang;
use App\Models\MutasiStok;
use App\Models\PenerimaanKas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillingPasienController extends Controller
{
    public function index()
    {
        $data = BillingPasien::with('pasien')->latest()->get();
        return view('billing.index', compact('data'));
    }

    public function create()
    {
        $pasiens = \App\Models\Pasien::all();
        $obats = \App\Models\ObatAlkes::all();
        $tarifs = \App\Models\TarifLayanan::all();
        
        // Nomor invoice otomatis
        $lastBilling = BillingPasien::latest()->first();
        $nextId = $lastBilling ? $lastBilling->id + 1 : 1;
        $no_invoice = 'INV/' . date('Y/m/') . str_pad($nextId, 4, '0', STR_PAD_LEFT);

        return view('billing.create', compact('pasiens', 'obats', 'tarifs', 'no_invoice'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $billing = BillingPasien::create([
                'no_invoice' => $request->no_invoice,
                'pasien_id' => $request->pasien_id,
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan,
                'total_tagihan' => 0,
                'status' => 'Belum Bayar'
            ]);

            $total = 0;

            // Proses Items
            if ($request->has('items')) {
                foreach ($request->items as $item) {
                    $subtotal = $item['jumlah'] * $item['harga_satuan'];
                    $total += $subtotal;
                    
                    \App\Models\BillingItem::create([
                        'billing_id' => $billing->id,
                        'jenis_item' => $item['jenis_item'],
                        'nama_item' => $item['nama_item'],
                        'obat_id' => $item['jenis_item'] == 'Obat' ? $item['obat_id'] : null,
                        'jumlah' => $item['jumlah'],
                        'harga_satuan' => $item['harga_satuan'],
                        'subtotal' => $subtotal
                    ]);
                }
            }

            $billing->update(['total_tagihan' => $total]);

            DB::commit();
            return redirect()->route('billing.index')->with('success', 'Tagihan berhasil dibuat!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $billing = BillingPasien::with(['pasien', 'items'])->findOrFail($id);
        return view('billing.show', compact('billing'));
    }

    public function pay(Request $request, $id)
    {
        $request->validate([
            'metode_pembayaran' => 'required',
            'uang_dibayar' => 'required|numeric'
        ]);

        $billing = BillingPasien::with('pasien', 'items')->findOrFail($id);
        
        if ($request->uang_dibayar < $billing->total_tagihan) {
            return back()->with('error', 'Uang pembayaran kurang dari total tagihan.');
        }

        DB::beginTransaction();
        try {
            // Update status billing
            $billing->update([
                'status' => 'Lunas',
                'metode_pembayaran' => $request->metode_pembayaran
            ]);

            // Jika ada item obat, kurangi stok
            foreach ($billing->items as $item) {
                if ($item->jenis_item == 'Obat' && $item->obat_id) {
                    $stok = StokGudang::where('obat_alkes_id', $item->obat_id)->first();
                    if ($stok && $stok->stok_tersedia >= $item->jumlah) {
                        $stok->decrement('stok_tersedia', $item->jumlah);
                        
                        MutasiStok::create([
                            'obat_alkes_id' => $item->obat_id,
                            'stok_gudang_id' => $stok->id,
                            'tanggal' => now()->format('Y-m-d'),
                            'jenis' => 'keluar',
                            'jumlah' => $item->jumlah,
                            'saldo_sesudah' => $stok->stok_tersedia, // Already decremented
                            'sumber' => 'pelayanan',
                            'referensi_id' => $billing->id,
                            'keterangan' => 'Penjualan ke pasien: ' . $billing->pasien->nama,
                            'input_oleh' => auth()->id() ?? 1
                        ]);
                    }
                }
            }

            // Catat ke Penerimaan Kas (Pendapatan BLUD)
            $sumberDanaUmum = DB::table('sumber_danas')->where('kode', 'SD-01')->first(); // PAD Umum
            PenerimaanKas::create([
                'no_bukti' => 'BKM-KASIR-' . time(),
                'tanggal' => now()->format('Y-m-d'),
                'jenis_penerimaan' => 'Layanan_Umum',
                'sumber_dana_id' => $sumberDanaUmum->id ?? 1,
                'keterangan' => 'Pembayaran Pasien ' . $billing->pasien->nama,
                'jumlah' => $billing->total_tagihan,
                'metode_pembayaran' => $request->metode_pembayaran,
                'status' => 'draft', // Menunggu setor bendahara
                'input_oleh' => auth()->id() ?? 1
            ]);

            DB::commit();
            return back()->with('success', 'Pembayaran berhasil diproses.')->with('print_id', $billing->id);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal memproses pembayaran: ' . $e->getMessage());
        }
    }

    public function print($id)
    {
        $billing = BillingPasien::with('pasien', 'items')->findOrFail($id);
        $config = DB::table('konfigurasi_sistemas')->pluck('nilai', 'kunci')->toArray();
        return view('billing.print', compact('billing', 'config'));
    }

    public function destroy($id)
    {
        BillingPasien::destroy($id);
        return redirect()->route('billing.index')->with('success', 'Tagihan berhasil dihapus!');
    }
}
