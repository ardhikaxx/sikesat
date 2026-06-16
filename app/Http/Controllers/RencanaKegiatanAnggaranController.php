<?php

namespace App\Http\Controllers;

use App\Models\RencanaKegiatanAnggaran;
use Illuminate\Http\Request;

class RencanaKegiatanAnggaranController extends Controller
{
    public function index()
    {
        $data = RencanaKegiatanAnggaran::latest()->get();
        return view('rencana-kegiatan-anggaran.index', compact('data'));
    }

    public function create()
    {
        return view('rencana-kegiatan-anggaran.create');
    }

    public function store(Request $request)
    {
        RencanaKegiatanAnggaran::create($request->except('_token'));
        return redirect()->route('rencana-kegiatan-anggaran.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = RencanaKegiatanAnggaran::findOrFail($id);
        return view('rencana-kegiatan-anggaran.show', compact('data'));
    }

    public function edit($id)
    {
        $data = RencanaKegiatanAnggaran::findOrFail($id);
        return view('rencana-kegiatan-anggaran.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = RencanaKegiatanAnggaran::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('rencana-kegiatan-anggaran.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        RencanaKegiatanAnggaran::destroy($id);
        return redirect()->route('rencana-kegiatan-anggaran.index')->with('sukses', 'Data berhasil dihapus');
    }
}
