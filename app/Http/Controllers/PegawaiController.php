<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::with('unit')->get();
        return view('pegawai.index', compact('pegawais'));
    }

    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();
        return response()->json(['success' => true, 'message' => 'Data pegawai berhasil dihapus.']);
    }
}
