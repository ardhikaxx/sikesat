<?php

namespace App\Http\Controllers;

use App\Models\PenerimaanKasDetail;
use Illuminate\Http\Request;

class PenerimaanKasDetailController extends Controller
{
    public function index()
    {
        $data = PenerimaanKasDetail::latest()->get();
        return view('penerimaan-kas-detail.index', compact('data'));
    }

    public function create()
    {
        return view('penerimaan-kas-detail.create');
    }

    public function store(Request $request)
    {
        PenerimaanKasDetail::create($request->except('_token'));
        return redirect()->route('penerimaan-kas-detail.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = PenerimaanKasDetail::findOrFail($id);
        return view('penerimaan-kas-detail.show', compact('data'));
    }

    public function edit($id)
    {
        $data = PenerimaanKasDetail::findOrFail($id);
        return view('penerimaan-kas-detail.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = PenerimaanKasDetail::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('penerimaan-kas-detail.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        PenerimaanKasDetail::destroy($id);
        return redirect()->route('penerimaan-kas-detail.index')->with('sukses', 'Data berhasil dihapus');
    }
}
