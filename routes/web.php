<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\GetMoviesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\TheaterController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UsiaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/film/{id}', [FilmController::class, 'show'])->name('film.show');
Route::get('/film/{filmId}/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');

Route::get('/genre', [GenreController::class, 'index'])->name('genre.index');
Route::get('/usia', [UsiaController::class, 'index'])->name('usia.index');

Route::get('/seats', [TheaterController::class, 'seats'])->name('seats');
Route::get('/movies/search', [GetMoviesController::class, 'search'])->name('movies.search');

Route::post('/payment/process', [TransactionController::class, 'processPayment'])->name('payment.process');
Route::post('/payment/save', [TransactionController::class, 'saveTransaction'])->name('payment.save');

Route::get('/dashboard', function () {
    return redirect()->route('home');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/riwayat', [TransactionController::class, 'history'])->name('riwayat');
});

require __DIR__ . '/auth.php';
