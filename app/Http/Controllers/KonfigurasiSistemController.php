<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KonfigurasiSistemController extends Controller
{
    public function index()
    {
        // Ambil data konfigurasi dari database jika tabelnya ada
        $config = DB::table('konfigurasi_sistemas')->first();
        return view('konfigurasi.index', compact('config'));
    }
}
