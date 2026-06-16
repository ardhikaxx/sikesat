<?php

namespace App\Http\Controllers;

use App\Models\PengeluaranKas;
use Illuminate\Http\Request;

class PengeluaranKasController extends Controller
{
    public function index()
    {
        $pengeluarans = PengeluaranKas::with(['sumber_dana'])->orderBy('tanggal', 'desc')->get();
        return view('pengeluaran.index', compact('pengeluarans'));
    }
}
