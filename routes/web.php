<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ActorController;

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

Route::get('/edit-movies/{id}' , [MovieController::class , 'editMoviePage'])->middleware('auth')->name('admin.editMoviePage');

Route::post('/edit-movies/{id}' , [MovieController::class , 'eidtMovie'])->middleware('auth')->name('admin.editMovie');


// Admin Actor Page

Route::get('/all-actors' , [ActorController::class , 'allActors'])->middleware('auth')->name('admin.allActors');

Route::get('/create-actors' , [ActorController::class , 'createActorPage'])->middleware('auth')->name('admin.createActorPage');
Route::post('/create-actors' , [ActorController::class , 'createActor'])->middleware('auth')->name('admin.createActor');