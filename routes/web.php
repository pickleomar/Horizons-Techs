<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionController;

Route::get('/', function () {
    return view('home');
})->name("home");

// Articles Routes
// Route::get('/articles', [ArticleController::class, "index"])->middleware(["auth", "verified", "role:admin"])->name('articles.index');

Route::get('/articles/{article}', [ArticleController::class, "show"]);

// Themes Routes
Route::get("/themes", [ThemeController::class, "index"])->name("themes.index");
Route::get("/themes/create", [ThemeController::class, "create"])->name("themes.create");
Route::post("/themes/create", [ThemeController::class, "store"]);

// View Theme
Route::get("/themes/{theme}", [ThemeController::class, "show"])->name("themes.show");
// Delete Themes
Route::delete("/themes/{id}", [ThemeController::class, "destroy"])->name("themes.destroy");
// View Theme Articles
Route::get('themes/{theme}/articles', [ArticleController::class, "index"])->middleware(["auth", "verified"])->name('articles.index');
Route::get('themes/{theme}/articles/{article}', [ArticleController::class, "index"])->middleware(["auth", "verified"])->name('articles.show');
Route::get('themes/{theme}/articles/create', [ArticleController::class, "create"])->middleware(["auth", "verified"])->name('article.create');
Route::post('themes/{theme}/articles/create', [ArticleController::class, "store"])->middleware(["auth", "verified"]);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . "/dashboard.php";