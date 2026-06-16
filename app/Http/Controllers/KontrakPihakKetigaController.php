<?php

namespace App\Http\Controllers;

use App\Models\KontrakPihakKetiga;
use Illuminate\Http\Request;

class KontrakPihakKetigaController extends Controller
{
    public function index()
    {
        $data = KontrakPihakKetiga::latest()->get();
        return view('kontrak.index', compact('data'));
    }

    public function create()
    {
        return view('kontrak.create');
    }

    public function store(Request $request)
    {
        KontrakPihakKetiga::create($request->all());
        return redirect()->route('kontrak.index')->with('success', 'Kontrak berhasil ditambahkan!');
    }

    public function show($id)
    {
        $kontrak = KontrakPihakKetiga::findOrFail($id);
        return view('kontrak.show', compact('kontrak'));
    }

    public function edit($id)
    {
        $kontrak = KontrakPihakKetiga::findOrFail($id);
        return view('kontrak.edit', compact('kontrak'));
    }

    public function update(Request $request, $id)
    {
        $kontrak = KontrakPihakKetiga::findOrFail($id);
        $kontrak->update($request->all());
        return redirect()->route('kontrak.index')->with('success', 'Kontrak berhasil diubah!');
    }

    public function destroy($id)
    {
        KontrakPihakKetiga::destroy($id);
        return redirect()->route('kontrak.index')->with('success', 'Kontrak berhasil dihapus!');
    }
}
