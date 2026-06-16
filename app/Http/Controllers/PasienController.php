<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $data = Pasien::latest()->get();
        return view('pasien.index', compact('data'));
    }

    public function create()
    {
        return view('pasien.create');
    }

    public function store(Request $request)
    {
        Pasien::create($request->except('_token'));
        return redirect()->route('pasien.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = Pasien::findOrFail($id);
        return view('pasien.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Pasien::findOrFail($id);
        return view('pasien.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Pasien::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('pasien.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Pasien::destroy($id);
        return redirect()->route('pasien.index')->with('sukses', 'Data berhasil dihapus');
    }
}
