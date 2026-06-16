<?php

namespace App\Http\Controllers;

use App\Models\IndikatorMutu;
use Illuminate\Http\Request;

class MutuController extends Controller
{
    public function index()
    {
        $indikators = IndikatorMutu::all();
        return view('mutu.index', compact('indikators'));
    }
}
