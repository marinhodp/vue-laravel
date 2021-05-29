<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/user/{id}', [UserController::class, 'get']);
Route::get('/user', [UserController::class, 'list']);
Route::post('/user', [UserController::class, 'add']);
