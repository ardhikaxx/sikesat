<?php

namespace App\Http\Controllers;

use App\Models\AkunAkuntansi;
use Illuminate\Http\Request;

class AkunAkuntansiController extends Controller
{
    public function index()
    {
        $data = AkunAkuntansi::latest()->get();
        return view('akun-akuntansi.index', compact('data'));
    }

    public function create()
    {
        return view('akun-akuntansi.create');
    }

    public function store(Request $request)
    {
        AkunAkuntansi::create($request->except('_token'));
        return redirect()->route('akun-akuntansi.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = AkunAkuntansi::findOrFail($id);
        return view('akun-akuntansi.show', compact('data'));
    }

    public function edit($id)
    {
        $data = AkunAkuntansi::findOrFail($id);
        return view('akun-akuntansi.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = AkunAkuntansi::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('akun-akuntansi.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        AkunAkuntansi::destroy($id);
        return redirect()->route('akun-akuntansi.index')->with('sukses', 'Data berhasil dihapus');
    }
}
