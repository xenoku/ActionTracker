<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserControllerApi;
use App\Http\Controllers\ActivityControllerApi;
use App\Http\Controllers\MySessionControllerApi;

Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('/user', function(Request $request) {
        return $request->user();
    });
    Route::get('/users', [UserControllerApi::class, 'index']);
    Route::get('/users/{id}', [UserControllerApi::class, 'show']);
    Route::get('/activities', [ActivityControllerApi::class, 'index']);
    Route::get('/activities/{id}', [ActivityControllerApi::class, 'show']);
    Route::get('/sessions', [MySessionControllerApi::class, 'index']);
    Route::get('/sessions/{id}', [MySessionControllerApi::class, 'show']);
    Route::get('/logout', [AuthController::class, 'logout']);
});