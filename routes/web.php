<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieDetailController;

Route::get('/quanlyphim', [MovieController::class, 'manage'])->name('movie.manage');
Route::post('/xoaphim', [MovieController::class, 'delete'])->name('movie.delete');

Route::get('/themphim', [MovieController::class, 'create'])->name('movie.create');
Route::post('/themphim', [MovieController::class, 'store'])->name('movie.store');

Route::get('/', [HomeController::class, 'index']);
Route::get('/phim/{id}', [MovieDetailController::class, 'show'])->name('movie.detail');
Route::get('/theloai/{id}', [MovieController::class, 'genre']);
Route::post('/timkiem', [MovieController::class, 'search']);