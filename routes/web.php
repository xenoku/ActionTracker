<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\MySessionController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return redirect()->intended('/main');
})->middleware('auth');

Route::get('/main', function () {
    return view('main');
})->middleware('auth');

Route::get('/error', function () {
    return view('error', ['message' => session('message')]);
})->middleware('auth');

Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::post('/auth', [LoginController::class, 'authenticate']);

Route::get('/users', [UserController::class, 'index'])->middleware('auth');

Route::get('/users/{id}/activities', [UserController::class, 'showActivities'])->middleware('auth');

Route::get('/users/{id}/sessions', [UserController::class, 'showSessions'])->middleware('auth');

Route::get('/activities', [ActivityController::class, 'index'])->middleware('auth');

Route::get('/activities/new', [ActivityController::class, 'create'])->middleware('auth');

Route::post('/activities/store', [ActivityController::class, 'store']);

Route::get('/activities/edit/{id}', [ActivityController::class, 'edit'])->middleware('auth');

Route::post('/activities/update/{id}', [ActivityController::class, 'update']);

Route::get('/activities/delete/{id}', [ActivityController::class, 'destroy'])->middleware('auth');

Route::get('/sessions', [MySessionController::class, 'index'])->middleware('auth');

Route::post('/sessions/new', [MySessionController::class, 'new']);

Route::get('/sessions/create', [MySessionController::class, 'create'])->middleware('auth');

Route::post('/sessions/create/store', [MySessionController::class, 'store']);

Route::get('/sessions/{id}/edit', [MySessionController::class, 'edit'])->middleware('auth');

Route::post('/sessions/{id}/edit/update', [MySessionController::class, 'update']);

Route::get('/sessions/delete/{id}', [MySessionController::class, 'destroy'])->middleware('auth');