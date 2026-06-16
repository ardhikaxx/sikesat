<?php

namespace App\Http\Controllers;

use App\Models\SurveiKepuasan;
use Illuminate\Http\Request;

class SurveiKepuasanController extends Controller
{
    public function index()
    {
        $data = SurveiKepuasan::latest()->get();
        return view('survei-kepuasan.index', compact('data'));
    }

    public function create()
    {
        return view('survei-kepuasan.create');
    }

    public function store(Request $request)
    {
        SurveiKepuasan::create($request->except('_token'));
        return redirect()->route('survei-kepuasan.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = SurveiKepuasan::findOrFail($id);
        return view('survei-kepuasan.show', compact('data'));
    }

    public function edit($id)
    {
        $data = SurveiKepuasan::findOrFail($id);
        return view('survei-kepuasan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = SurveiKepuasan::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('survei-kepuasan.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        SurveiKepuasan::destroy($id);
        return redirect()->route('survei-kepuasan.index')->with('sukses', 'Data berhasil dihapus');
    }
}
