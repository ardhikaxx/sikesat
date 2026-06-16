<?php

namespace App\Http\Controllers;

use App\Models\UnitPelayanan;
use Illuminate\Http\Request;

class UnitPelayananController extends Controller
{
    public function index()
    {
        $data = UnitPelayanan::latest()->get();
        return view('unit-pelayanan.index', compact('data'));
    }

    public function create()
    {
        return view('unit-pelayanan.create');
    }

    public function store(Request $request)
    {
        UnitPelayanan::create($request->except('_token'));
        return redirect()->route('unit-pelayanan.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = UnitPelayanan::findOrFail($id);
        return view('unit-pelayanan.show', compact('data'));
    }

    public function edit($id)
    {
        $data = UnitPelayanan::findOrFail($id);
        return view('unit-pelayanan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = UnitPelayanan::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('unit-pelayanan.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        UnitPelayanan::destroy($id);
        return redirect()->route('unit-pelayanan.index')->with('sukses', 'Data berhasil dihapus');
    }
}
