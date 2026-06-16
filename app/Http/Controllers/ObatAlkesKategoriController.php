<?php

namespace App\Http\Controllers;

use App\Models\ObatAlkesKategori;
use Illuminate\Http\Request;

class ObatAlkesKategoriController extends Controller
{
    public function index()
    {
        $data = ObatAlkesKategori::latest()->get();
        return view('obat-alkes-kategori.index', compact('data'));
    }

    public function create()
    {
        return view('obat-alkes-kategori.create');
    }

    public function store(Request $request)
    {
        ObatAlkesKategori::create($request->except('_token'));
        return redirect()->route('obat-alkes-kategori.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = ObatAlkesKategori::findOrFail($id);
        return view('obat-alkes-kategori.show', compact('data'));
    }

    public function edit($id)
    {
        $data = ObatAlkesKategori::findOrFail($id);
        return view('obat-alkes-kategori.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = ObatAlkesKategori::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('obat-alkes-kategori.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        ObatAlkesKategori::destroy($id);
        return redirect()->route('obat-alkes-kategori.index')->with('sukses', 'Data berhasil dihapus');
    }
}
