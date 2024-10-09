<?php

use App\Http\Controllers\Admin\CreateTrainerController;
use App\Http\Controllers\Admin\CreateTrainingController;
use App\Http\Controllers\Admin\GetClientsListController;
use App\Http\Controllers\Admin\GetTrainersController;
use App\Http\Controllers\Admin\GetTrainingTypesController;
use App\Http\Controllers\Admin\ScheduleListController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignUpController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\GetGymsController;
use App\Http\Controllers\GetScheduleListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')
    ->group(function () {
        Route::get('/user', UserController::class);
        Route::post('/change_password', ChangePasswordController::class);
});

Route::get('/schedule', GetScheduleListController::class);

Route::post('/login', LoginController::class);

Route::post('/sign-up', SignUpController::class);

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});

Route::get('/gyms', GetGymsController::class);

Route::get('/admin/clients', GetClientsListController::class);

Route::get('/admin/schedule', ScheduleListController::class);

Route::post('/admin/training/create', CreateTrainingController::class);

Route::get('/admin/trainers', GetTrainersController::class);

Route::post('/admin/trainers', CreateTrainerController::class);

Route::get('/admin/training_types', GetTrainingTypesController::class);

