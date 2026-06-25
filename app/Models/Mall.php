<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mall extends Model
{
    protected $guarded = [];

    public function jadwalFilms()
    {
        return $this->hasMany(JadwalFilm::class);
    }
}
