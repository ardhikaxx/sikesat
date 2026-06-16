<?php

namespace App\Http\Controllers;

use App\Models\SpmIndikator;
use Illuminate\Http\Request;

class SpmIndikatorController extends Controller
{
    public function index()
    {
        $data = SpmIndikator::latest()->get();
        return view('spm-indikator.index', compact('data'));
    }

    public function create()
    {
        return view('spm-indikator.create');
    }

    public function store(Request $request)
    {
        SpmIndikator::create($request->except('_token'));
        return redirect()->route('spm-indikator.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = SpmIndikator::findOrFail($id);
        return view('spm-indikator.show', compact('data'));
    }

    public function edit($id)
    {
        $data = SpmIndikator::findOrFail($id);
        return view('spm-indikator.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = SpmIndikator::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('spm-indikator.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        SpmIndikator::destroy($id);
        return redirect()->route('spm-indikator.index')->with('sukses', 'Data berhasil dihapus');
    }
}
