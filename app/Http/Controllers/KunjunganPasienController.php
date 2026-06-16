<?php

namespace App\Http\Controllers;

use App\Models\KunjunganPasien;
use Illuminate\Http\Request;

class KunjunganPasienController extends Controller
{
    public function index()
    {
        $data = KunjunganPasien::latest()->get();
        return view('kunjungan-pasien.index', compact('data'));
    }

    public function create()
    {
        return view('kunjungan-pasien.create');
    }

    public function store(Request $request)
    {
        KunjunganPasien::create($request->except('_token'));
        return redirect()->route('kunjungan-pasien.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = KunjunganPasien::findOrFail($id);
        return view('kunjungan-pasien.show', compact('data'));
    }

    public function edit($id)
    {
        $data = KunjunganPasien::findOrFail($id);
        return view('kunjungan-pasien.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = KunjunganPasien::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('kunjungan-pasien.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        KunjunganPasien::destroy($id);
        return redirect()->route('kunjungan-pasien.index')->with('sukses', 'Data berhasil dihapus');
    }
}
