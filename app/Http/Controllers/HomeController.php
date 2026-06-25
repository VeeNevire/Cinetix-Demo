<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Transaction;

class HomeController extends Controller
{
    public function index()
    {
        $films = Film::orderBy('id')->get();

        $topFilms = Film::selectRaw('films.*, COUNT(transactions.id) as jumlah_transaksi')
            ->leftJoin('transactions', 'films.nama_film', '=', 'transactions.nama_film')
            ->groupBy('films.id')
            ->orderByDesc('jumlah_transaksi')
            ->limit(10)
            ->get();

        return view('home', compact('films', 'topFilms'));
    }
}
