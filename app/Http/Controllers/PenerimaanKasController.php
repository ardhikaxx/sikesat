<?php

namespace App\Http\Controllers;

use App\Models\PenerimaanKas;
use Illuminate\Http\Request;

class PenerimaanKasController extends Controller
{
    public function index()
    {
        $data = PenerimaanKas::latest()->get();
        return view('penerimaan-kas.index', compact('data'));
    }

    public function create()
    {
        return view('penerimaan-kas.create');
    }

    public function store(Request $request)
    {
        PenerimaanKas::create($request->except('_token'));
        return redirect()->route('penerimaan-kas.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = PenerimaanKas::findOrFail($id);
        return view('penerimaan-kas.show', compact('data'));
    }

    public function edit($id)
    {
        $data = PenerimaanKas::findOrFail($id);
        return view('penerimaan-kas.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = PenerimaanKas::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('penerimaan-kas.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        PenerimaanKas::destroy($id);
        return redirect()->route('penerimaan-kas.index')->with('sukses', 'Data berhasil dihapus');
    }
}
