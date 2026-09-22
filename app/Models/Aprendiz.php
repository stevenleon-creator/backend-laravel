<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aprendiz extends Model
{
    protected $table = 'aprendices';

    protected $fillable = [
        'nombre',
        'apellidos',
        'edad',
        'genero',
        'ciudad',
        'pais',
    ];
}