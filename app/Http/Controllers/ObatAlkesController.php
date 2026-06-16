<?php

namespace App\Http\Controllers;

use App\Models\ObatAlkes;
use Illuminate\Http\Request;

class ObatAlkesController extends Controller
{
    public function index()
    {
        $data = ObatAlkes::latest()->get();
        return view('obat-alkes.index', compact('data'));
    }

    public function create()
    {
        return view('obat-alkes.create');
    }

    public function store(Request $request)
    {
        ObatAlkes::create($request->except('_token'));
        return redirect()->route('obat-alkes.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = ObatAlkes::findOrFail($id);
        return view('obat-alkes.show', compact('data'));
    }

    public function edit($id)
    {
        $data = ObatAlkes::findOrFail($id);
        return view('obat-alkes.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = ObatAlkes::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('obat-alkes.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        ObatAlkes::destroy($id);
        return redirect()->route('obat-alkes.index')->with('sukses', 'Data berhasil dihapus');
    }
}
