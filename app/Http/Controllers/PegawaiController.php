<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $data = Pegawai::latest()->get();
        return view('pegawai.index', compact('data'));
    }

    public function create()
    {
        return view('pegawai.create');
    }

    public function store(Request $request)
    {
        Pegawai::create($request->except('_token'));
        return redirect()->route('pegawai.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = Pegawai::findOrFail($id);
        return view('pegawai.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Pegawai::findOrFail($id);
        return view('pegawai.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Pegawai::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('pegawai.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Pegawai::destroy($id);
        return redirect()->route('pegawai.index')->with('sukses', 'Data berhasil dihapus');
    }
}
