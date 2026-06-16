<?php

namespace App\Http\Controllers;

use App\Models\JurnalUmum;
use Illuminate\Http\Request;

class JurnalUmumController extends Controller
{
    public function index()
    {
        $data = JurnalUmum::latest()->get();
        return view('jurnal-umum.index', compact('data'));
    }

    public function create()
    {
        return view('jurnal-umum.create');
    }

    public function store(Request $request)
    {
        JurnalUmum::create($request->except('_token'));
        return redirect()->route('jurnal-umum.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = JurnalUmum::findOrFail($id);
        return view('jurnal-umum.show', compact('data'));
    }

    public function edit($id)
    {
        $data = JurnalUmum::findOrFail($id);
        return view('jurnal-umum.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = JurnalUmum::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('jurnal-umum.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        JurnalUmum::destroy($id);
        return redirect()->route('jurnal-umum.index')->with('sukses', 'Data berhasil dihapus');
    }
}
