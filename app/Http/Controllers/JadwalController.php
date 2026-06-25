<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\JadwalFilm;

class JadwalController extends Controller
{
    public function index($filmId)
    {
        $film = Film::findOrFail($filmId);
        $hargaTiket = $film->harga;

        $jadwals = JadwalFilm::with('mall')
            ->where('film_id', $filmId)
            ->whereDate('tanggal_tayang', '<=', now())
            ->whereDate('tanggal_akhir_tayang', '>=', now())
            ->get();

        return view('jadwal.index', compact('film', 'hargaTiket', 'jadwals'));
    }
}
