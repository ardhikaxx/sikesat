<?php

namespace App\Http\Controllers;

use App\Models\StokGudang;
use Illuminate\Http\Request;

class StokGudangController extends Controller
{
    public function index()
    {
        $data = StokGudang::latest()->get();
        return view('stok-gudang.index', compact('data'));
    }

    public function create()
    {
        return view('stok-gudang.create');
    }

    public function store(Request $request)
    {
        StokGudang::create($request->except('_token'));
        return redirect()->route('stok-gudang.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = StokGudang::findOrFail($id);
        return view('stok-gudang.show', compact('data'));
    }

    public function edit($id)
    {
        $data = StokGudang::findOrFail($id);
        return view('stok-gudang.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = StokGudang::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('stok-gudang.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        StokGudang::destroy($id);
        return redirect()->route('stok-gudang.index')->with('sukses', 'Data berhasil dihapus');
    }
}
