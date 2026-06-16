<?php

namespace App\Http\Controllers;

use App\Models\SpmCapaian;
use Illuminate\Http\Request;

class SpmCapaianController extends Controller
{
    public function index()
    {
        $data = SpmCapaian::latest()->get();
        return view('spm-capaian.index', compact('data'));
    }

    public function create()
    {
        return view('spm-capaian.create');
    }

    public function store(Request $request)
    {
        SpmCapaian::create($request->except('_token'));
        return redirect()->route('spm-capaian.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = SpmCapaian::findOrFail($id);
        return view('spm-capaian.show', compact('data'));
    }

    public function edit($id)
    {
        $data = SpmCapaian::findOrFail($id);
        return view('spm-capaian.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = SpmCapaian::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('spm-capaian.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        SpmCapaian::destroy($id);
        return redirect()->route('spm-capaian.index')->with('sukses', 'Data berhasil dihapus');
    }
}
