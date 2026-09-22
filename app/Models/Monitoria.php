<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Monitoria extends Model
{
    protected $connection = 'mongodb';

    protected $collection = 'monitorias';

    protected $fillable = [
        'aprendiz_id',
        'fecha',
        'tema',
        'instructor',
        'observaciones',
    ];
}