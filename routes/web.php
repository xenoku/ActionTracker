<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\MySessionController;
use App\Http\Controllers\LoginController;

// редирект на основную страницу
Route::get('/', function () {
    return redirect()->intended('/main');
})->middleware('auth');

// основная страница
Route::get('/main', function () {
    return view('main', ['user_name' => session('user_name')]);
})->middleware('auth');

// страница логина
Route::get('/login', [LoginController::class, 'login'])->name('login');

// метод логаута
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');

// метод аутентификации
Route::post('/auth', [LoginController::class, 'authenticate']);

// список пользователей, доступен только администратору
Route::get('/users', [UserController::class, 'index'])->middleware('auth');

// список занятостей пользователя, доступен только администратору
Route::get('/users/{id}/activities', [UserController::class, 'showActivities'])->middleware('auth');

// список сессий пользователя, доступен только администратору
Route::get('/users/{id}/sessions', [UserController::class, 'showSessions'])->middleware('auth');

// список занятостей пользователя
Route::get('/activities', [ActivityController::class, 'index'])->middleware('auth');

// форма для генерации навой занятости
Route::get('/activities/new', [ActivityController::class, 'create'])->middleware('auth');

// метод для внесения новосозданной занятости в базу данных
Route::post('/activities/store', [ActivityController::class, 'store']);

// форма для изменения существующей занятости
Route::get('/activities/edit/{id}', [ActivityController::class, 'edit'])->middleware('auth');

// метод для внесения изменений в существующую занятость
Route::post('/activities/update/{id}', [ActivityController::class, 'update']);

// метод для удаления существующей занятости
Route::get('/activities/delete/{id}', [ActivityController::class, 'destroy'])->middleware('auth');

// список сессий занятости пользователя
Route::get('/sessions', [MySessionController::class, 'index'])->middleware('auth');

// метод генерации новой сессии
Route::post('/sessions/new', [MySessionController::class, 'new']);

// форма для ручного создания новой сессии в ручную, доступна только администратору
Route::get('/sessions/create', [MySessionController::class, 'create'])->middleware('auth');

// метод для внесения новосозданной сессии базу данных
Route::post('/sessions/create/store', [MySessionController::class, 'store']);

// форма для изменения существующей занятости, доступна только администратору
Route::get('/sessions/{id}/edit', [MySessionController::class, 'edit'])->middleware('auth');

// метод для внесения изменений в существующую занятость
Route::post('/sessions/{id}/edit/update', [MySessionController::class, 'update']);

// метод для удаления существующей занятости
Route::get('/sessions/delete/{id}', [MySessionController::class, 'destroy'])->middleware('auth');