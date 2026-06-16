<?php

namespace App\Http\Controllers;

use App\Models\JurnalUmum;
use Illuminate\Http\Request;

class JurnalUmumController extends Controller
{
    public function index()
    {
        $jurnals = JurnalUmum::orderBy('tanggal', 'desc')->get();
        return view('jurnal.index', compact('jurnals'));
    }
}
