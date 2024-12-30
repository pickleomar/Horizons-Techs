<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerNewUser'])->name('register');
    // Route::get('/login', [AuthController::class, 'login'])->name('login');
    // Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});

// Route::group(['middleware' => 'auth'], function () {
//     Route::get('/home', [HomeController::class, 'index']);
//     Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
// });