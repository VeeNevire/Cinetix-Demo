<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class UsiaController extends Controller
{
    public function index(Request $request)
    {
        $usia = $request->get('usia', '');
        $films = Film::where('usia', $usia)->get();
        return view('usia.index', compact('films', 'usia'));
    }
}
