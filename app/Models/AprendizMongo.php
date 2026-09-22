<?php

namespace App\Models;

// Usar la clase de MongoDB Eloquent
use MongoDB\Laravel\Eloquent\Model; // O use Jenssegers\Mongodb\Eloquent\Model; según la librería instalada

class AprendizMongo extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'aprendices';

    // Permitir asignación masiva de campos
    protected $fillable = ['nombre', 'apellidos', 'edad', 'genero', 'ciudad', 'pais'];

    // Asegura que MongoDB exponga _id como id (cadena de texto) para React
    protected $appends = ['id'];
}