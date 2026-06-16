<?php

namespace App\Http\Controllers;

use App\Models\BukuBesar;
use Illuminate\Http\Request;

class BukuBesarController extends Controller
{
    public function index()
    {
        $data = BukuBesar::latest()->get();
        return view('buku-besar.index', compact('data'));
    }

    public function create()
    {
        return view('buku-besar.create');
    }

    public function store(Request $request)
    {
        BukuBesar::create($request->except('_token'));
        return redirect()->route('buku-besar.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = BukuBesar::findOrFail($id);
        return view('buku-besar.show', compact('data'));
    }

    public function edit($id)
    {
        $data = BukuBesar::findOrFail($id);
        return view('buku-besar.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = BukuBesar::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('buku-besar.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        BukuBesar::destroy($id);
        return redirect()->route('buku-besar.index')->with('sukses', 'Data berhasil dihapus');
    }
}
