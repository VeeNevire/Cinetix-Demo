<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalFilm extends Model
{
    protected $guarded = [];

    public function mall()
    {
        return $this->belongsTo(Mall::class);
    }

    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}
