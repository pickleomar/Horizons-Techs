<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


Route::get('/articles', [ArticleController::class, "index"])->middleware(["auth", "verified"])->name('articles.index');
Route::get('/articles/create', [ArticleController::class, "create"])->middleware(["auth", "verified"])->name('article.create');
Route::post('/articles/create', [ArticleController::class, "store"])->middleware(["auth", "verified"]);
Route::get('/articles/{article}', [ArticleController::class, "show"]);


Route::get('/themes', [ThemeController::class, 'index'])->name('themes');
Route::get('/themes/{id}', [ThemeController::class, 'show'])->name('themes.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';