<?php

namespace App\Http\Controllers;

use App\Models\JaspelParameter;
use Illuminate\Http\Request;

class JaspelParameterController extends Controller
{
    public function index()
    {
        $data = JaspelParameter::latest()->get();
        return view('jaspel-parameter.index', compact('data'));
    }

    public function create()
    {
        return view('jaspel-parameter.create');
    }

    public function store(Request $request)
    {
        JaspelParameter::create($request->except('_token'));
        return redirect()->route('jaspel-parameter.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = JaspelParameter::findOrFail($id);
        return view('jaspel-parameter.show', compact('data'));
    }

    public function edit($id)
    {
        $data = JaspelParameter::findOrFail($id);
        return view('jaspel-parameter.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = JaspelParameter::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('jaspel-parameter.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        JaspelParameter::destroy($id);
        return redirect()->route('jaspel-parameter.index')->with('sukses', 'Data berhasil dihapus');
    }
}
