<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class GetMoviesController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('q');
        $films = Film::where('nama_film', 'LIKE', "%{$query}%")
            ->limit(10)
            ->get(['id', 'nama_film']);

        return response()->json($films);
    }
}
