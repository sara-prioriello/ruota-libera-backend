<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BikeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/bikes', [BikeController::class, 'index']);
Route::get('/bikes/{bike}', [BikeController::class, 'show']);