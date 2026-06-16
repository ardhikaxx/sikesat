<?php

namespace App\Http\Controllers;

use App\Models\RkaRincian;
use Illuminate\Http\Request;

class RkaRincianController extends Controller
{
    public function index()
    {
        $data = RkaRincian::latest()->get();
        return view('rka-rincian.index', compact('data'));
    }

    public function create()
    {
        return view('rka-rincian.create');
    }

    public function store(Request $request)
    {
        RkaRincian::create($request->except('_token'));
        return redirect()->route('rka-rincian.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = RkaRincian::findOrFail($id);
        return view('rka-rincian.show', compact('data'));
    }

    public function edit($id)
    {
        $data = RkaRincian::findOrFail($id);
        return view('rka-rincian.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = RkaRincian::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('rka-rincian.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        RkaRincian::destroy($id);
        return redirect()->route('rka-rincian.index')->with('sukses', 'Data berhasil dihapus');
    }
}
