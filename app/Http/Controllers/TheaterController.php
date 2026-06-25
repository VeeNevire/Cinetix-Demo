<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use Illuminate\Http\Request;

class TheaterController extends Controller
{
    public function seats(Request $request)
    {
        $mallName = $request->get('mall_name');
        $filmName = $request->get('film_name');

        if (!$mallName || !$filmName) {
            return response()->json(['error' => 'Parameter tidak lengkap']);
        }

        $occupiedSeats = Seat::where('mall_name', $mallName)
            ->where('film_name', $filmName)
            ->where('status', 'occupied')
            ->pluck('seat_number')
            ->toArray();

        return response()->json([
            'success' => true,
            'occupiedSeats' => $occupiedSeats,
        ]);
    }
}
