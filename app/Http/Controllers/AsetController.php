<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    public function index()
    {
        $asets = Aset::with('kategori')->get();
        return view('aset.index', compact('asets'));
    }
}
