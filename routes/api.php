<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/cities', [CityController::class, 'create']);
Route::get('/cities', [CityController::class, 'get']);
Route::put('/cities', [CityController::class, 'update']);
Route::delete('/cities', [CityController::class, 'delete']);
