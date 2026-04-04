<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;

Route::get('/', function () {
    return view('layouts.user.favorites-index');
})->name('main.index');



//Admin Login 

Route::get('/admin', function () {
    return view('layouts.admin.admin-login');
})->name('admin.dash');

Route::post('/admin' , [AuthController::class , 'login'])->name('admin.login');


Route::get('/dash', function () {
    return view('layouts.admin.admin-dashboard');
})->middleware('auth')->name('admin.dashboard');


//Admin Movies Pages  

Route::get('/all-movies' , [MovieController::class , 'allMovies'])->middleware('auth')->name('admin.allMovies');
Route::get('/create-movies' , [MovieController::class , 'moviesPage'])->middleware('auth')->name('admin.moviesPage');
Route::post('/create-movies' , [MovieController::class , 'createMovie'])->middleware('auth')->name('admin.createMovie');