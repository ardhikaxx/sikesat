<?php

namespace App\Http\Controllers;

use App\Models\RealisasiIndikatorMutu;
use Illuminate\Http\Request;

class RealisasiIndikatorMutuController extends Controller
{
    public function index()
    {
        $data = RealisasiIndikatorMutu::latest()->get();
        return view('realisasi-indikator-mutu.index', compact('data'));
    }

    public function create()
    {
        return view('realisasi-indikator-mutu.create');
    }

    public function store(Request $request)
    {
        RealisasiIndikatorMutu::create($request->except('_token'));
        return redirect()->route('realisasi-indikator-mutu.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = RealisasiIndikatorMutu::findOrFail($id);
        return view('realisasi-indikator-mutu.show', compact('data'));
    }

    public function edit($id)
    {
        $data = RealisasiIndikatorMutu::findOrFail($id);
        return view('realisasi-indikator-mutu.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = RealisasiIndikatorMutu::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('realisasi-indikator-mutu.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        RealisasiIndikatorMutu::destroy($id);
        return redirect()->route('realisasi-indikator-mutu.index')->with('sukses', 'Data berhasil dihapus');
    }
}
