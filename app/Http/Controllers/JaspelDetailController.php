<?php

namespace App\Http\Controllers;

use App\Models\JaspelDetail;
use Illuminate\Http\Request;

class JaspelDetailController extends Controller
{
    public function index()
    {
        $data = JaspelDetail::latest()->get();
        return view('jaspel-detail.index', compact('data'));
    }

    public function create()
    {
        return view('jaspel-detail.create');
    }

    public function store(Request $request)
    {
        JaspelDetail::create($request->except('_token'));
        return redirect()->route('jaspel-detail.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = JaspelDetail::findOrFail($id);
        return view('jaspel-detail.show', compact('data'));
    }

    public function edit($id)
    {
        $data = JaspelDetail::findOrFail($id);
        return view('jaspel-detail.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = JaspelDetail::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('jaspel-detail.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        JaspelDetail::destroy($id);
        return redirect()->route('jaspel-detail.index')->with('sukses', 'Data berhasil dihapus');
    }
}
