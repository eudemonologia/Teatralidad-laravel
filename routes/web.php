<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MoviesController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\UserController;

Route::get('/', [MoviesController::class, 'index'])->name('home');
Route::get('/movie/{id}', [MoviesController::class, 'show']);

Route::get('/series', [SeriesController::class, 'index'])->name('series');
Route::get('/serie/{id}', [SeriesController::class, 'show']);

Route::get('/search/{query}', [MoviesController::class, 'search']);

Route::get('/user/{id}', [UserController::class, 'show']);
Route::put('/user/{id}', [UserController::class, 'update']);
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('/user/{id}/edit', [UserController::class, 'edit']);
Route::post('/user', [UserController::class, 'store']);
Route::get('/register', [UserController::class, 'create']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);
