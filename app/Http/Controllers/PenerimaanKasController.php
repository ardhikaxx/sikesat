<?php

namespace App\Http\Controllers;

use App\Models\PenerimaanKas;
use Illuminate\Http\Request;

class PenerimaanKasController extends Controller
{
    public function index()
    {
        $penerimaans = PenerimaanKas::with(['sumber_dana', 'unit'])->orderBy('tanggal', 'desc')->get();
        return view('penerimaan.index', compact('penerimaans'));
    }
}
