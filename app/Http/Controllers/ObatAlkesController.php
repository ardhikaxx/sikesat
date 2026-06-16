<?php

namespace App\Http\Controllers;

use App\Models\ObatAlkes;
use Illuminate\Http\Request;

class ObatAlkesController extends Controller
{
    public function index()
    {
        $obats = ObatAlkes::all();
        return view('obat.index', compact('obats'));
    }
}
