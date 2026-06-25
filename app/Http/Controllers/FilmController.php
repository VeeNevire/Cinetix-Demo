<?php

namespace App\Http\Controllers;

use App\Models\Film;

class FilmController extends Controller
{
    public function show($id)
    {
        $film = Film::findOrFail($id);
        return view('film.show', compact('film'));
    }
}
