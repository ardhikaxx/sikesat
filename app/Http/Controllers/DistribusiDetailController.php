<?php

namespace App\Http\Controllers;

use App\Models\DistribusiDetail;
use Illuminate\Http\Request;

class DistribusiDetailController extends Controller
{
    public function index()
    {
        $data = DistribusiDetail::latest()->get();
        return view('distribusi-detail.index', compact('data'));
    }

    public function create()
    {
        return view('distribusi-detail.create');
    }

    public function store(Request $request)
    {
        DistribusiDetail::create($request->except('_token'));
        return redirect()->route('distribusi-detail.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = DistribusiDetail::findOrFail($id);
        return view('distribusi-detail.show', compact('data'));
    }

    public function edit($id)
    {
        $data = DistribusiDetail::findOrFail($id);
        return view('distribusi-detail.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = DistribusiDetail::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('distribusi-detail.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        DistribusiDetail::destroy($id);
        return redirect()->route('distribusi-detail.index')->with('sukses', 'Data berhasil dihapus');
    }
}
