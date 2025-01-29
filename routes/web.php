<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;

Route::get("/", [HomeController::class, "index"])->name("home");

Route::get("/articles", [ArticleController::class, "public_index"])->name("articles.public");
Route::get("/articles/{article}", [ArticleController::class, "public_show"])->name("articles.public.show");
// Themes Routes
Route::get("/themes", [ThemeController::class, "index"])->name("themes.index");
Route::get("/themes/create", [ThemeController::class, "create"])->middleware("auth")->name("themes.create");
Route::post("/themes/create", [ThemeController::class, "store"])->middleware("auth");


// View Theme
Route::get("/themes/{theme}", [ThemeController::class, "show"])->name("themes.show")->middleware("auth");
// Delete Themes



// View Theme Articles
Route::get('themes/{theme}/articles/{article}', [ArticleController::class, "show"])->middleware(["auth", "verified"])->name('articles.show');


Route::get('articles/{theme}/create', [ArticleController::class, "create"])->middleware(["auth", "verified"])->name('article.create');
Route::post('articles/{theme}/create', [ArticleController::class, "store"])->middleware(["auth", "verified"]);

//Magazines Routes
Route::get("/magazines", [IssueController::class, "index"])->name("magazines.index");
Route::get("/magazines/create", [IssueController::class, "create"])->name("magazines.create");
Route::get('/magazines/{id}', [IssueController::class, 'show'])->name('magazines.show');
Route::get('/magazines/{id}/download', [IssueController::class, 'download'])->name('magazines.download');
Route::get('/magazines/{id}/load-more', [IssueController::class, 'loadMore'])->name('magazines.loadMore');




// Store a chat message (accessible to subscribers)
Route::post('/chats', [ChatController::class, 'store'])
    ->middleware(['auth', 'verified', 'role:editor,admin,subscriber'])
    ->name('chats.store');

// Delete a chat message (accessible to admins/editors)
Route::delete('/chats', [ChatController::class, 'destroy'])
    ->middleware(['auth', 'verified', 'role:admin,editor,subscriber'])
    ->name('chats.destroy');
// Rating Routes (nested under themes and articles)

Route::middleware(["auth", "verified"])->group(function () {
    // Rate an article
    Route::get('/articles/{theme}/{article}/rate', [RatingController::class, 'rateArticle'])->name('rate.article');
    //Route::post('themes/{theme}/articles/{article}/rate', [RatingController::class, 'rateArticle'])->name('articles.rate');

    // Get average rating for an article
    Route::get(
        'themes/{theme}/articles/{articleId}/average-rating',
        [RatingController::class, 'getAverageRating']
    )->name('articles.average-rating');
});

require __DIR__ . '/auth.php';
require __DIR__ . "/dashboard.php";
