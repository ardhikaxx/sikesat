<?php

namespace App\Http\Controllers;

use App\Models\PenyusutanAset;
use Illuminate\Http\Request;

class PenyusutanAsetController extends Controller
{
    public function index()
    {
        $data = PenyusutanAset::with('aset')->latest()->get();
        return view('penyusutan-aset.index', compact('data'));
    }

    public function generate()
    {
        $bulan = date('m');
        $tahun = date('Y');

        $asets = \App\Models\Aset::with('kategori')->where('status', 'Aktif')->where('nilai_buku', '>', 0)->get();
        $count = 0;

        foreach ($asets as $aset) {
            // Cek apakah sudah disusutkan bulan ini
            $exists = PenyusutanAset::where('aset_id', $aset->id)
                        ->where('periode_bulan', $bulan)
                        ->where('periode_tahun', $tahun)
                        ->exists();

            if (!$exists && $aset->kategori && $aset->kategori->masa_manfaat_tahun > 0) {
                // Hitung penyusutan garis lurus
                $masaManfaatBulan = $aset->kategori->masa_manfaat_tahun * 12;
                $penyusutanBulanIni = $aset->nilai_perolehan / $masaManfaatBulan;

                // Jangan sampai nilai buku minus
                if ($penyusutanBulanIni > $aset->nilai_buku) {
                    $penyusutanBulanIni = $aset->nilai_buku;
                }

                $nilaiBukuBaru = $aset->nilai_buku - $penyusutanBulanIni;

                // Hitung akumulasi
                $akumulasiSebelumnya = PenyusutanAset::where('aset_id', $aset->id)->sum('nilai_penyusutan');
                $akumulasiBaru = $akumulasiSebelumnya + $penyusutanBulanIni;

                PenyusutanAset::create([
                    'aset_id' => $aset->id,
                    'periode_bulan' => $bulan,
                    'periode_tahun' => $tahun,
                    'nilai_penyusutan' => $penyusutanBulanIni,
                    'akumulasi_penyusutan' => $akumulasiBaru,
                    'nilai_buku_sesudah' => $nilaiBukuBaru,
                ]);

                // Update nilai buku aset
                $aset->update(['nilai_buku' => $nilaiBukuBaru]);
                $count++;
            }
        }

        return redirect()->route('penyusutan-aset.index')->with('success', "Berhasil menghitung penyusutan untuk $count aset pada bulan $bulan/$tahun.");
    }

    public function create()
    {
        return view('penyusutan-aset.create');
    }

    public function store(Request $request)
    {
        PenyusutanAset::create($request->except('_token'));
        return redirect()->route('penyusutan-aset.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = PenyusutanAset::findOrFail($id);
        return view('penyusutan-aset.show', compact('data'));
    }

    public function edit($id)
    {
        $data = PenyusutanAset::findOrFail($id);
        return view('penyusutan-aset.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = PenyusutanAset::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('penyusutan-aset.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        PenyusutanAset::destroy($id);
        return redirect()->route('penyusutan-aset.index')->with('sukses', 'Data berhasil dihapus');
    }
}
