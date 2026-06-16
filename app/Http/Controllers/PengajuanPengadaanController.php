<?php

namespace App\Http\Controllers;

use App\Models\PengajuanPengadaan;
use Illuminate\Http\Request;

class PengajuanPengadaanController extends Controller
{
    public function index()
    {
        $data = PengajuanPengadaan::latest()->get();
        return view('pengajuan-pengadaan.index', compact('data'));
    }

    public function create()
    {
        return view('pengajuan-pengadaan.create');
    }

    public function store(Request $request)
    {
        PengajuanPengadaan::create($request->except('_token'));
        return redirect()->route('pengajuan-pengadaan.index')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = PengajuanPengadaan::findOrFail($id);
        return view('pengajuan-pengadaan.show', compact('data'));
    }

    public function edit($id)
    {
        $data = PengajuanPengadaan::findOrFail($id);
        return view('pengajuan-pengadaan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = PengajuanPengadaan::findOrFail($id);
        $data->update($request->except(['_token', '_method']));
        return redirect()->route('pengajuan-pengadaan.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function verify($id)
    {
        $data = PengajuanPengadaan::findOrFail($id);
        if ($data->status == 'draft') {
            $data->update([
                'status' => 'diverifikasi',
                'diverifikasi_oleh' => auth()->id() ?? 1,
                'diverifikasi_at' => now()
            ]);
            return redirect()->back()->with('success', 'Pengajuan berhasil diverifikasi oleh Kepala Tata Usaha.');
        }
        return redirect()->back()->with('error', 'Status tidak valid untuk diverifikasi.');
    }

    public function approve($id)
    {
        $data = PengajuanPengadaan::findOrFail($id);
        if ($data->status == 'diverifikasi') {
            $data->update([
                'status' => 'disetujui',
                'disetujui_oleh' => auth()->id() ?? 1,
                'disetujui_at' => now()
            ]);
            return redirect()->back()->with('success', 'Pengajuan disetujui secara final. Siap untuk diterbitkan PO.');
        }
        return redirect()->back()->with('error', 'Status tidak valid untuk disetujui.');
    }

    public function reject(Request $request, $id)
    {
        $data = PengajuanPengadaan::findOrFail($id);
        $data->update([
            'status' => 'ditolak',
            'catatan' => $request->catatan ?? 'Ditolak oleh sistem/pimpinan.'
        ]);
        return redirect()->back()->with('success', 'Pengajuan telah ditolak.');
    }

    public function destroy($id)
    {
        PengajuanPengadaan::destroy($id);
        return redirect()->route('pengajuan-pengadaan.index')->with('sukses', 'Data berhasil dihapus');
    }
}
