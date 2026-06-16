<?php

namespace App\Http\Controllers;

use App\Models\AkunAkuntansi;
use Illuminate\Http\Request;

class AkunAkuntansiController extends Controller
{
    public function index()
    {
        $akuns = AkunAkuntansi::orderBy('kode_akun')->get();
        return view('akun-akuntansi.index', compact('akuns'));
    }
}
