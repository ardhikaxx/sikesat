<?php

namespace App\Http\Controllers;

use App\Models\TahunAnggaran;
use Illuminate\Http\Request;

class TahunAnggaranController extends Controller
{
    public function index()
    {
        $data = TahunAnggaran::latest()->get();
        return view('tahun-anggaran.index', compact('data'));
    }

    public function create()
    {
        return view('tahun-anggaran.create');
    }

    public function store(Request $request)
    {
        TahunAnggaran::create($request->except('_token'));
        return redirect()->route('tahun-anggaran.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = TahunAnggaran::findOrFail($id);
        return view('tahun-anggaran.show', compact('data'));
    }

    public function edit($id)
    {
        $data = TahunAnggaran::findOrFail($id);
        return view('tahun-anggaran.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = TahunAnggaran::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('tahun-anggaran.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        TahunAnggaran::destroy($id);
        return redirect()->route('tahun-anggaran.index')->with('sukses', 'Data berhasil dihapus');
    }
}
