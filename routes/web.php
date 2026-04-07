<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieDetailController;


Route::get('/', [HomeController::class, 'index']);
Route::get('/phim/{id}', [MovieDetailController::class, 'show'])->name('movie.detail');