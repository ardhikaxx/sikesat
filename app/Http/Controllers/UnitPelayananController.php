<?php

namespace App\Http\Controllers;

use App\Models\UnitPelayanan;
use Illuminate\Http\Request;

class UnitPelayananController extends Controller
{
    public function index()
    {
        $units = UnitPelayanan::all();
        return view('unit-pelayanan.index', compact('units'));
    }
}
