<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    public function index()
    {
        $data = Aset::latest()->get();
        return view('aset.index', compact('data'));
    }

    public function create()
    {
        return view('aset.create');
    }

    public function store(Request $request)
    {
        Aset::create($request->except('_token'));
        return redirect()->route('aset.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = Aset::findOrFail($id);
        return view('aset.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Aset::findOrFail($id);
        return view('aset.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Aset::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('aset.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Aset::destroy($id);
        return redirect()->route('aset.index')->with('sukses', 'Data berhasil dihapus');
    }
}
