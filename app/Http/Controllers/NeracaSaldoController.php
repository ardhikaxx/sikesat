<?php

namespace App\Http\Controllers;

use App\Models\NeracaSaldo;
use Illuminate\Http\Request;

class NeracaSaldoController extends Controller
{
    public function index()
    {
        $data = NeracaSaldo::latest()->get();
        return view('neraca-saldo.index', compact('data'));
    }

    public function create()
    {
        return view('neraca-saldo.create');
    }

    public function store(Request $request)
    {
        NeracaSaldo::create($request->except('_token'));
        return redirect()->route('neraca-saldo.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = NeracaSaldo::findOrFail($id);
        return view('neraca-saldo.show', compact('data'));
    }

    public function edit($id)
    {
        $data = NeracaSaldo::findOrFail($id);
        return view('neraca-saldo.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = NeracaSaldo::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('neraca-saldo.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        NeracaSaldo::destroy($id);
        return redirect()->route('neraca-saldo.index')->with('sukses', 'Data berhasil dihapus');
    }
}
