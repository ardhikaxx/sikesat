<?php

namespace App\Http\Controllers;

use App\Models\RencanaBisnisAnggaran;
use Illuminate\Http\Request;

class RencanaBisnisAnggaranController extends Controller
{
    public function index()
    {
        $data = RencanaBisnisAnggaran::latest()->get();
        return view('rencana-bisnis-anggaran.index', compact('data'));
    }

    public function create()
    {
        return view('rencana-bisnis-anggaran.create');
    }

    public function store(Request $request)
    {
        RencanaBisnisAnggaran::create($request->except('_token'));
        return redirect()->route('rencana-bisnis-anggaran.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = RencanaBisnisAnggaran::findOrFail($id);
        return view('rencana-bisnis-anggaran.show', compact('data'));
    }

    public function edit($id)
    {
        $data = RencanaBisnisAnggaran::findOrFail($id);
        return view('rencana-bisnis-anggaran.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = RencanaBisnisAnggaran::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('rencana-bisnis-anggaran.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        RencanaBisnisAnggaran::destroy($id);
        return redirect()->route('rencana-bisnis-anggaran.index')->with('sukses', 'Data berhasil dihapus');
    }
}
