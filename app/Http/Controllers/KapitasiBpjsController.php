<?php

namespace App\Http\Controllers;

use App\Models\KapitasiBpjs;
use Illuminate\Http\Request;

class KapitasiBpjsController extends Controller
{
    public function index()
    {
        $data = KapitasiBpjs::latest()->get();
        return view('kapitasi-bpjs.index', compact('data'));
    }

    public function create()
    {
        return view('kapitasi-bpjs.create');
    }

    public function store(Request $request)
    {
        KapitasiBpjs::create($request->except('_token'));
        return redirect()->route('kapitasi-bpjs.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = KapitasiBpjs::findOrFail($id);
        return view('kapitasi-bpjs.show', compact('data'));
    }

    public function edit($id)
    {
        $data = KapitasiBpjs::findOrFail($id);
        return view('kapitasi-bpjs.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = KapitasiBpjs::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('kapitasi-bpjs.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        KapitasiBpjs::destroy($id);
        return redirect()->route('kapitasi-bpjs.index')->with('sukses', 'Data berhasil dihapus');
    }
}
