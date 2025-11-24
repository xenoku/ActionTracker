<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\MySessionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserController::class, 'index']);

Route::get('/users/{id}/activities', [UserController::class, 'showActivities']);

Route::get('/users/{id}/sessions', [UserController::class, 'showSessions']);

Route::get('/activities', [ActivityController::class, 'index']);

Route::get('/sessions', [MySessionController::class, 'index']);

Route::get('/sessions/create', [MySessionController::class, 'create']);

Route::post('/sessions/create/store', [MySessionController::class, 'store']);

Route::get('/sessions/{id}/edit', [MySessionController::class, 'edit']);

Route::post('/sessions/{id}/edit/update', [MySessionController::class, 'update']);

Route::get('/sessions/{id}/delete', [MySessionController::class, 'destroy']);