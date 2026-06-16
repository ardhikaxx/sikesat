<?php

namespace App\Http\Controllers;

use App\Models\RencanaBisnisAnggaran;
use Illuminate\Http\Request;

class RBAController extends Controller
{
    public function index()
    {
        $rbas = RencanaBisnisAnggaran::with(['tahun_anggaran', 'sumber_dana'])->get();
        return view('rba.index', compact('rbas'));
    }
}
