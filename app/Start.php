<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Start extends Model
{
    protected $fillable = [
        'puntuacion', 'busine_id', 'user_id',
    ];
}
