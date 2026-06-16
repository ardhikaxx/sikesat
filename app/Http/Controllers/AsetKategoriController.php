<?php

namespace App\Http\Controllers;

use App\Models\AsetKategori;
use Illuminate\Http\Request;

class AsetKategoriController extends Controller
{
    public function index()
    {
        $data = AsetKategori::latest()->get();
        return view('aset-kategori.index', compact('data'));
    }

    public function create()
    {
        return view('aset-kategori.create');
    }

    public function store(Request $request)
    {
        AsetKategori::create($request->except('_token'));
        return redirect()->route('aset-kategori.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = AsetKategori::findOrFail($id);
        return view('aset-kategori.show', compact('data'));
    }

    public function edit($id)
    {
        $data = AsetKategori::findOrFail($id);
        return view('aset-kategori.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = AsetKategori::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('aset-kategori.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        AsetKategori::destroy($id);
        return redirect()->route('aset-kategori.index')->with('sukses', 'Data berhasil dihapus');
    }
}
