<?php

namespace App\Http\Controllers;

use App\Models\IndikatorMutu;
use Illuminate\Http\Request;

class IndikatorMutuController extends Controller
{
    public function index()
    {
        $data = IndikatorMutu::latest()->get();
        return view('indikator-mutu.index', compact('data'));
    }

    public function create()
    {
        return view('indikator-mutu.create');
    }

    public function store(Request $request)
    {
        IndikatorMutu::create($request->except('_token'));
        return redirect()->route('indikator-mutu.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = IndikatorMutu::findOrFail($id);
        return view('indikator-mutu.show', compact('data'));
    }

    public function edit($id)
    {
        $data = IndikatorMutu::findOrFail($id);
        return view('indikator-mutu.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = IndikatorMutu::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('indikator-mutu.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        IndikatorMutu::destroy($id);
        return redirect()->route('indikator-mutu.index')->with('sukses', 'Data berhasil dihapus');
    }
}
