<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MoviesController;

Route::get('/', [MoviesController::class, 'index'])->name('home');
Route::get('/movie/{id}', [MoviesController::class, 'show']);
Route::get('/search/{query}', [MoviesController::class, 'search']);
