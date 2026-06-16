<?php

namespace App\Http\Controllers;

use App\Models\DistribusiKeUnit;
use Illuminate\Http\Request;

class DistribusiKeUnitController extends Controller
{
    public function index()
    {
        $data = DistribusiKeUnit::latest()->get();
        return view('distribusi-ke-unit.index', compact('data'));
    }

    public function create()
    {
        return view('distribusi-ke-unit.create');
    }

    public function store(Request $request)
    {
        DistribusiKeUnit::create($request->except('_token'));
        return redirect()->route('distribusi-ke-unit.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = DistribusiKeUnit::findOrFail($id);
        return view('distribusi-ke-unit.show', compact('data'));
    }

    public function edit($id)
    {
        $data = DistribusiKeUnit::findOrFail($id);
        return view('distribusi-ke-unit.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = DistribusiKeUnit::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('distribusi-ke-unit.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        DistribusiKeUnit::destroy($id);
        return redirect()->route('distribusi-ke-unit.index')->with('sukses', 'Data berhasil dihapus');
    }
}
