<?php

namespace App\Http\Controllers;

use App\Models\TarifLayanan;
use Illuminate\Http\Request;

class TarifLayananController extends Controller
{
    public function index()
    {
        $data = TarifLayanan::orderBy('kategori')->orderBy('nama_layanan')->get();
        return view('tarif-layanan.index', compact('data'));
    }

    public function create()
    {
        return view('tarif-layanan.create');
    }

    public function store(Request $request)
    {
        TarifLayanan::create($request->except('_token'));
        return redirect()->route('tarif-layanan.index')->with('success', 'Data Master Tarif berhasil ditambahkan');
    }

    public function edit(TarifLayanan $tarifLayanan)
    {
        return view('tarif-layanan.edit', compact('tarifLayanan'));
    }

    public function update(Request $request, TarifLayanan $tarifLayanan)
    {
        $tarifLayanan->update($request->except(['_token', '_method']));
        return redirect()->route('tarif-layanan.index')->with('success', 'Data Master Tarif berhasil diupdate');
    }

    public function destroy(TarifLayanan $tarifLayanan)
    {
        $tarifLayanan->delete();
        return redirect()->route('tarif-layanan.index')->with('success', 'Data Master Tarif berhasil dihapus');
    }
}
