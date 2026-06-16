<?php

namespace App\Http\Controllers;

use App\Models\SumberDana;
use Illuminate\Http\Request;

class SumberDanaController extends Controller
{
    public function index()
    {
        $data = SumberDana::latest()->get();
        return view('sumber-dana.index', compact('data'));
    }

    public function create()
    {
        return view('sumber-dana.create');
    }

    public function store(Request $request)
    {
        SumberDana::create($request->except('_token'));
        return redirect()->route('sumber-dana.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = SumberDana::findOrFail($id);
        return view('sumber-dana.show', compact('data'));
    }

    public function edit($id)
    {
        $data = SumberDana::findOrFail($id);
        return view('sumber-dana.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = SumberDana::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('sumber-dana.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        SumberDana::destroy($id);
        return redirect()->route('sumber-dana.index')->with('sukses', 'Data berhasil dihapus');
    }
}
