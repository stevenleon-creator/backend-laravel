<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class AprendizMongo extends Model
{
    protected $connection = 'mongodb';

    protected $collection = 'aprendices';

    protected $fillable = [
        'nombre',
        'apellidos',
        'edad',
        'genero',
        'ciudad',
        'pais',
    ];
}