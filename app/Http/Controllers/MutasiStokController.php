<?php

namespace App\Http\Controllers;

use App\Models\MutasiStok;
use Illuminate\Http\Request;

class MutasiStokController extends Controller
{
    public function index()
    {
        $data = MutasiStok::latest()->get();
        return view('mutasi-stok.index', compact('data'));
    }

    public function create()
    {
        return view('mutasi-stok.create');
    }

    public function store(Request $request)
    {
        MutasiStok::create($request->except('_token'));
        return redirect()->route('mutasi-stok.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = MutasiStok::findOrFail($id);
        return view('mutasi-stok.show', compact('data'));
    }

    public function edit($id)
    {
        $data = MutasiStok::findOrFail($id);
        return view('mutasi-stok.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = MutasiStok::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('mutasi-stok.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        MutasiStok::destroy($id);
        return redirect()->route('mutasi-stok.index')->with('sukses', 'Data berhasil dihapus');
    }
}
