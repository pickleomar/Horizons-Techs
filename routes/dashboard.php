<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\ThemeController;


// Routes can be access by the role=user
Route::middleware('auth',)->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/subscriptions', [SubscriptionController::class, 'index'])->name('dashboard.subscriptions');
    // Create a subscription
    Route::post('/subscriptions', [SubscriptionController::class, 'store'])->name('subscriptions.store');
    // Remove Subscription
    Route::delete('/subscriptions', [SubscriptionController::class, 'destroy'])->name('subscriptions.destroy');

    Route::get('/dashboard/history', [HistoryController::class, 'index'])->name('dashboard.history');
    Route::delete('/history', [HistoryController::class, 'destroy'])->name('history.destroy');


    Route::get('/dashboard/profile', [ProfileController::class, 'index'])->name('dashboard.profile');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/dashboard/articles', [ArticleController::class, 'index'])->name('dashboard.articles');
    Route::post('/articles/{article_id}/publish', [ArticleController::class, 'publish'])->name('articles.publish');
    Route::delete('/articles', [ArticleController::class, 'destroy'])->name('articles.destroy');
});



//
Route::middleware(['auth', "role:editor,admin"])->group(function () {

    // approve / reject Subscription
    Route::post('/subscriptions/{user_id}/{theme_id}/approve', [SubscriptionController::class, 'approve'])->name('subscriptions.approve');
    Route::post('/subscriptions/{user_id}/{theme_id}/reject', [SubscriptionController::class, 'reject'])->name('subscriptions.reject');


    Route::post('/articles/{article_id}/approve', [ArticleController::class, 'approve'])->name('articles.approve');
    Route::post('/articles/{article_id}/reject', [ArticleController::class, 'reject'])->name('articles.reject');



    Route::get('/dashboard/themes', [ThemeController::class, 'manage'])->name('dashboard.themes');
    Route::get('/dashboard/themes/{id}/subscription', [SubscriptionController::class, 'manage_subscriptions'])->name('dashboard.theme.subscriptions');
    Route::get('/dashboard/themes/{id}/articles', [ArticleController::class, 'manage_articles'])->name('dashboard.theme.articles');

    // History Related
});
