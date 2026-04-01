<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('layouts.user.favorites-index');
});

Route::get('/dash', function () {
    return view('layouts.admin.admin-dashboard')->name('admin.dashboard');
});


//Admin Login 

Route::get('/admin', function () {
    return view('layouts.admin.admin-login');
})->name('admin.dash');

Route::post('/admin' , [AuthController::class , 'login'])->name('admin.login');