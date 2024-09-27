<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignUpController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\GetGymsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', UserController::class)
    ->middleware('auth:sanctum');

Route::post('/login', LoginController::class);

Route::post('/sign-up', SignUpController::class);

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});

Route::get('/gyms', GetGymsController::class);
