<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserControllerApi;
use App\Http\Controllers\ActivityControllerApi;
use App\Http\Controllers\MySessionControllerApi;

Route::get('/user', [UserControllerApi::class, 'index']);

Route::get('/user/{id}', [UserControllerApi::class, 'show']);

Route::get('/activity', [ActivityControllerApi::class, 'index']);

Route::get('/activity/{id}', [ActivityControllerApi::class, 'show']);

Route::get('/session', [MySessionControllerApi::class, 'index']);

Route::get('/session/{id}', [MySessionControllerApi::class, 'show']);