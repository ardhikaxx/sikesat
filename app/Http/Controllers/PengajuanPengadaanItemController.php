<?php

namespace App\Http\Controllers;

use App\Models\PengajuanPengadaanItem;
use Illuminate\Http\Request;

class PengajuanPengadaanItemController extends Controller
{
    public function index()
    {
        $data = PengajuanPengadaanItem::latest()->get();
        return view('pengajuan-pengadaan-item.index', compact('data'));
    }

    public function create()
    {
        return view('pengajuan-pengadaan-item.create');
    }

    public function store(Request $request)
    {
        PengajuanPengadaanItem::create($request->except('_token'));
        return redirect()->route('pengajuan-pengadaan-item.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = PengajuanPengadaanItem::findOrFail($id);
        return view('pengajuan-pengadaan-item.show', compact('data'));
    }

    public function edit($id)
    {
        $data = PengajuanPengadaanItem::findOrFail($id);
        return view('pengajuan-pengadaan-item.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = PengajuanPengadaanItem::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('pengajuan-pengadaan-item.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        PengajuanPengadaanItem::destroy($id);
        return redirect()->route('pengajuan-pengadaan-item.index')->with('sukses', 'Data berhasil dihapus');
    }
}
