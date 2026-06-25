<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $guarded = [];

    public function jadwalFilms()
    {
        return $this->hasMany(JadwalFilm::class);
    }
}
