<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.user.favorites-index');
});
Route::get('/abc', function () {
    return view('layouts.user.movies-index');
});
Route::get('/def', function () {
    return view('layouts.user.movies-show');
});
