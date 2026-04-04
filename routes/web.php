<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;

Route::get('/', function () {
    return view('layouts.user.favorites-index');
});

Route::get('/dash', function () {
    return view('layouts.admin.admin-dashboard');
})->name('admin.dashboard');


//Admin Login 

Route::get('/admin', function () {
    return view('layouts.admin.admin-login');
})->name('admin.dash');

Route::post('/admin' , [AuthController::class , 'login'])->name('admin.login');

//Admin Movies Pages  

Route::get('/all-movies' , [MovieController::class , 'allMovies'])->name('admin.allMovies');
Route::get('/create-movies' , [MovieController::class , 'moviesPage'])->name('admin.moviesPage');
Route::post('/create-movies' , [MovieController::class , 'createMovie'])->name('admin.createMovie');