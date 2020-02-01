<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Horario extends Model
{
    protected $fillable = ['busine_id', 'dia', 'hora_inicio1', 'hora_final1', 'hora_inicio2', 'hora_final2'];
}
