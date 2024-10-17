<?php

use App\Http\Controllers\Admin\CreateTrainerController;
use App\Http\Controllers\Admin\CreateTrainingController;
use App\Http\Controllers\Admin\CreateTrainingTypesController;
use App\Http\Controllers\Admin\GetClientsListController;
use App\Http\Controllers\Admin\GetTrainersController;
use App\Http\Controllers\Admin\GetTrainingTypesController;
use App\Http\Controllers\Admin\RemoveScheduleController;
use App\Http\Controllers\Admin\RemoveTrainerController;
use App\Http\Controllers\Admin\RemoveTrainingTypeController;
use App\Http\Controllers\Admin\ScheduleListController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignUpController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\GetGymsController;
use App\Http\Controllers\GetPricesController;
use App\Http\Controllers\GetScheduleListController;
use App\Http\Controllers\GetTrainersListController;
use App\Http\Controllers\Payment\CreatePaymentController;
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

Route::delete('/admin/schedule/{id}', RemoveScheduleController::class);

Route::delete('/admin/trainers/{id}', RemoveTrainerController::class);

Route::delete('/admin/training_types/{id}', RemoveTrainingTypeController::class);

Route::post('/admin/training_types', CreateTrainingTypesController::class);

Route::post('/payment/create', CreatePaymentController::class);

Route::get('/trainers', GetTrainersListController::class);

Route::get('/prices', GetPricesController::class);
