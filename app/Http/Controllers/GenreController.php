<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index(Request $request)
    {
        $genre = $request->get('genre', '');
        $films = Film::where('genre', 'LIKE', "%{$genre}%")->get();
        return view('genre.index', compact('films', 'genre'));
    }
}
