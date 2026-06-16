<?php

namespace App\Http\Controllers;

use App\Models\BillingPasien;
use Illuminate\Http\Request;

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
        // Nomor invoice otomatis
        $lastBilling = BillingPasien::latest()->first();
        $nextId = $lastBilling ? $lastBilling->id + 1 : 1;
        $no_invoice = 'INV/' . date('Y/m/') . str_pad($nextId, 4, '0', STR_PAD_LEFT);

        return view('billing.create', compact('pasiens', 'obats', 'no_invoice'));
    }

    public function store(Request $request)
    {
        \DB::beginTransaction();
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

            \DB::commit();
            return redirect()->route('billing.index')->with('success', 'Tagihan berhasil dibuat!');
        } catch (\Exception $e) {
            \DB::rollBack();
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
        $billing = BillingPasien::with('items')->findOrFail($id);
        if ($billing->status == 'Lunas') {
            return back()->with('error', 'Tagihan sudah lunas!');
        }

        \DB::beginTransaction();
        try {
            // 1. Update status
            $billing->update([
                'status' => 'Lunas',
                'metode_pembayaran' => $request->metode_pembayaran
            ]);

            // 2. Masukkan ke Penerimaan Kas
            $penerimaan = \App\Models\PenerimaanKas::create([
                'tanggal' => date('Y-m-d'),
                'nomor_bukti' => 'BKM-' . time(),
                'jumlah' => $billing->total_tagihan,
                'keterangan' => 'Pembayaran Pasien ' . $billing->pasien->nama_lengkap . ' (' . $billing->no_invoice . ')',
                'status' => 'posted' // Anggap langsung posted untuk demo
            ]);

            $billing->update(['penerimaan_kas_id' => $penerimaan->id]);

            // 3. Potong Stok Obat & Catat Mutasi
            foreach ($billing->items as $item) {
                if ($item->jenis_item == 'Obat' && $item->obat_id) {
                    $stok = \App\Models\StokGudang::where('obat_id', $item->obat_id)->first();
                    if ($stok) {
                        $stok->jumlah_stok -= $item->jumlah;
                        $stok->save();

                        \App\Models\MutasiStok::create([
                            'obat_id' => $item->obat_id,
                            'tanggal' => date('Y-m-d'),
                            'jenis_mutasi' => 'Keluar',
                            'jumlah' => $item->jumlah,
                            'keterangan' => 'Terjual - ' . $billing->no_invoice
                        ]);
                    }
                }
            }

            \DB::commit();
            return back()->with('success', 'Pembayaran berhasil diproses. Stok obat telah disesuaikan dan kas bertambah!');
        } catch (\Exception $e) {
            \DB::rollBack();
            return back()->with('error', 'Gagal memproses pembayaran: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        BillingPasien::destroy($id);
        return redirect()->route('billing.index')->with('success', 'Tagihan berhasil dihapus!');
    }
}
