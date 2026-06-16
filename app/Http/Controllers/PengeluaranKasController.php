<?php

namespace App\Http\Controllers;

use App\Models\PengeluaranKas;
use Illuminate\Http\Request;

class PengeluaranKasController extends Controller
{
    public function index()
    {
        $data = PengeluaranKas::latest()->get();
        return view('pengeluaran-kas.index', compact('data'));
    }

    public function create()
    {
        return view('pengeluaran-kas.create');
    }

    public function store(Request $request)
    {
        PengeluaranKas::create($request->except('_token'));
        return redirect()->route('pengeluaran-kas.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = PengeluaranKas::findOrFail($id);
        return view('pengeluaran-kas.show', compact('data'));
    }

    public function edit($id)
    {
        $data = PengeluaranKas::findOrFail($id);
        return view('pengeluaran-kas.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = PengeluaranKas::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('pengeluaran-kas.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function verify($id)
    {
        $data = PengeluaranKas::findOrFail($id);
        if ($data->status == 'draft') {
            $data->update([
                'status' => 'diverifikasi',
                'diverifikasi_oleh' => auth()->id() ?? 1,
                'diverifikasi_at' => now()
            ]);
            return redirect()->back()->with('success', 'Bukti Pengeluaran Kas (SPJ) berhasil diverifikasi.');
        }
        return redirect()->back()->with('error', 'Status tidak valid untuk diverifikasi.');
    }

    public function pay($id)
    {
        $data = PengeluaranKas::findOrFail($id);
        if ($data->status == 'diverifikasi' || $data->status == 'disetujui') {
            $data->update([
                'status' => 'dibayar',
                'dibayar_oleh' => auth()->id() ?? 1,
                'dibayar_at' => now()
            ]);
            return redirect()->back()->with('success', 'Pengeluaran Kas berhasil dibayarkan.');
        }
        return redirect()->back()->with('error', 'Status tidak valid untuk dibayar.');
    }

    public function destroy($id)
    {
        PengeluaranKas::destroy($id);
        return redirect()->route('pengeluaran-kas.index')->with('sukses', 'Data berhasil dihapus');
    }
}
