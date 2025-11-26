<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\MySessionController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/error', function () {
    return view('error', ['message' => session('message')]);
});

Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::get('/logout', [LoginController::class, 'logout']);

Route::post('/auth', [LoginController::class, 'authenticate']);

Route::get('/users', [UserController::class, 'index']);

Route::get('/users/{id}/activities', [UserController::class, 'showActivities']);

Route::get('/users/{id}/sessions', [UserController::class, 'showSessions']);

Route::get('/activities', [ActivityController::class, 'index']);

Route::get('/sessions', [MySessionController::class, 'index'])->middleware('auth');

Route::get('/sessions/create', [MySessionController::class, 'create'])->middleware('auth');

Route::post('/sessions/create/store', [MySessionController::class, 'store'])->middleware('auth');

Route::get('/sessions/{id}/edit', [MySessionController::class, 'edit'])->middleware('auth');

Route::post('/sessions/{id}/edit/update', [MySessionController::class, 'update'])->middleware('auth');

Route::get('/sessions/{id}/delete', [MySessionController::class, 'destroy'])->middleware('auth');