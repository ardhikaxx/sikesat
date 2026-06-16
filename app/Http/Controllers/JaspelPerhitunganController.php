<?php

namespace App\Http\Controllers;

use App\Models\JaspelPerhitungan;
use Illuminate\Http\Request;

class JaspelPerhitunganController extends Controller
{
    public function index()
    {
        $data = JaspelPerhitungan::latest()->get();
        return view('jaspel-perhitungan.index', compact('data'));
    }

    public function create()
    {
        return view('jaspel-perhitungan.create');
    }

    public function store(Request $request)
    {
        JaspelPerhitungan::create($request->except('_token'));
        return redirect()->route('jaspel-perhitungan.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = JaspelPerhitungan::findOrFail($id);
        return view('jaspel-perhitungan.show', compact('data'));
    }

    public function edit($id)
    {
        $data = JaspelPerhitungan::findOrFail($id);
        return view('jaspel-perhitungan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = JaspelPerhitungan::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('jaspel-perhitungan.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        JaspelPerhitungan::destroy($id);
        return redirect()->route('jaspel-perhitungan.index')->with('sukses', 'Data berhasil dihapus');
    }
}
