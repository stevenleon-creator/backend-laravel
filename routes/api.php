<?php

use App\Http\Controllers\AprendizController;
use App\Http\Controllers\AprendizMongoController;
use App\Http\Controllers\MonitoriaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('aprendices', AprendizController::class);
Route::apiResource('aprendices-mongo', AprendizMongoController::class);
Route::apiResource('monitorias', MonitoriaController::class);