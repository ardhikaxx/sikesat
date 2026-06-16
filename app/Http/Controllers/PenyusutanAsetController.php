<?php

namespace App\Http\Controllers;

use App\Models\PenyusutanAset;
use Illuminate\Http\Request;

class PenyusutanAsetController extends Controller
{
    public function index()
    {
        $data = PenyusutanAset::latest()->get();
        return view('penyusutan-aset.index', compact('data'));
    }

    public function create()
    {
        return view('penyusutan-aset.create');
    }

    public function store(Request $request)
    {
        PenyusutanAset::create($request->except('_token'));
        return redirect()->route('penyusutan-aset.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = PenyusutanAset::findOrFail($id);
        return view('penyusutan-aset.show', compact('data'));
    }

    public function edit($id)
    {
        $data = PenyusutanAset::findOrFail($id);
        return view('penyusutan-aset.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = PenyusutanAset::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('penyusutan-aset.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        PenyusutanAset::destroy($id);
        return redirect()->route('penyusutan-aset.index')->with('sukses', 'Data berhasil dihapus');
    }
}
