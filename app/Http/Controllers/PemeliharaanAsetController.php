<?php

namespace App\Http\Controllers;

use App\Models\PemeliharaanAset;
use Illuminate\Http\Request;

class PemeliharaanAsetController extends Controller
{
    public function index()
    {
        $data = PemeliharaanAset::latest()->get();
        return view('pemeliharaan-aset.index', compact('data'));
    }

    public function create()
    {
        return view('pemeliharaan-aset.create');
    }

    public function store(Request $request)
    {
        PemeliharaanAset::create($request->except('_token'));
        return redirect()->route('pemeliharaan-aset.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = PemeliharaanAset::findOrFail($id);
        return view('pemeliharaan-aset.show', compact('data'));
    }

    public function edit($id)
    {
        $data = PemeliharaanAset::findOrFail($id);
        return view('pemeliharaan-aset.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = PemeliharaanAset::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('pemeliharaan-aset.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        PemeliharaanAset::destroy($id);
        return redirect()->route('pemeliharaan-aset.index')->with('sukses', 'Data berhasil dihapus');
    }
}
