<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function(){
    return response()->json('API sudah bisa digunakan');
});

Route::apiResource('user', \App\Http\Controllers\API\UserController::class);
// Route::post();
// Route::post();
