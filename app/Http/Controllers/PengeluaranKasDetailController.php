<?php

namespace App\Http\Controllers;

use App\Models\PengeluaranKasDetail;
use Illuminate\Http\Request;

class PengeluaranKasDetailController extends Controller
{
    public function index()
    {
        $data = PengeluaranKasDetail::latest()->get();
        return view('pengeluaran-kas-detail.index', compact('data'));
    }

    public function create()
    {
        return view('pengeluaran-kas-detail.create');
    }

    public function store(Request $request)
    {
        PengeluaranKasDetail::create($request->except('_token'));
        return redirect()->route('pengeluaran-kas-detail.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = PengeluaranKasDetail::findOrFail($id);
        return view('pengeluaran-kas-detail.show', compact('data'));
    }

    public function edit($id)
    {
        $data = PengeluaranKasDetail::findOrFail($id);
        return view('pengeluaran-kas-detail.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = PengeluaranKasDetail::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('pengeluaran-kas-detail.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        PengeluaranKasDetail::destroy($id);
        return redirect()->route('pengeluaran-kas-detail.index')->with('sukses', 'Data berhasil dihapus');
    }
}
