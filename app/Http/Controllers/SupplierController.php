<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $data = Supplier::latest()->get();
        return view('supplier.index', compact('data'));
    }

    public function create()
    {
        return view('supplier.create');
    }

    public function store(Request $request)
    {
        Supplier::create($request->except('_token'));
        return redirect()->route('supplier.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = Supplier::findOrFail($id);
        return view('supplier.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Supplier::findOrFail($id);
        return view('supplier.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Supplier::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('supplier.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Supplier::destroy($id);
        return redirect()->route('supplier.index')->with('sukses', 'Data berhasil dihapus');
    }
}
