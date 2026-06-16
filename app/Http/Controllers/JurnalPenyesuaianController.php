<?php

namespace App\Http\Controllers;

use App\Models\JurnalPenyesuaian;
use Illuminate\Http\Request;

class JurnalPenyesuaianController extends Controller
{
    public function index()
    {
        $data = JurnalPenyesuaian::latest()->get();
        return view('jurnal-penyesuaian.index', compact('data'));
    }

    public function create()
    {
        return view('jurnal-penyesuaian.create');
    }

    public function store(Request $request)
    {
        JurnalPenyesuaian::create($request->except('_token'));
        return redirect()->route('jurnal-penyesuaian.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = JurnalPenyesuaian::findOrFail($id);
        return view('jurnal-penyesuaian.show', compact('data'));
    }

    public function edit($id)
    {
        $data = JurnalPenyesuaian::findOrFail($id);
        return view('jurnal-penyesuaian.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = JurnalPenyesuaian::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('jurnal-penyesuaian.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        JurnalPenyesuaian::destroy($id);
        return redirect()->route('jurnal-penyesuaian.index')->with('sukses', 'Data berhasil dihapus');
    }
}
