<?php

namespace App\Http\Controllers;

use App\Models\JurnalDetail;
use Illuminate\Http\Request;

class JurnalDetailController extends Controller
{
    public function index()
    {
        $data = JurnalDetail::latest()->get();
        return view('jurnal-detail.index', compact('data'));
    }

    public function create()
    {
        return view('jurnal-detail.create');
    }

    public function store(Request $request)
    {
        JurnalDetail::create($request->except('_token'));
        return redirect()->route('jurnal-detail.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = JurnalDetail::findOrFail($id);
        return view('jurnal-detail.show', compact('data'));
    }

    public function edit($id)
    {
        $data = JurnalDetail::findOrFail($id);
        return view('jurnal-detail.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = JurnalDetail::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('jurnal-detail.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        JurnalDetail::destroy($id);
        return redirect()->route('jurnal-detail.index')->with('sukses', 'Data berhasil dihapus');
    }
}
