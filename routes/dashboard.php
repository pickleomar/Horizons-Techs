<?php

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
});



//
Route::middleware(['auth', "role:editor,admin"])->group(function () {

    // approve / reject Subscription
    Route::post('/subscriptions/{user_id}/{theme_id}/approve', [SubscriptionController::class, 'approve'])->name('subscriptions.approve');
    Route::post('/subscriptions/{user_id}/{theme_id}/reject', [SubscriptionController::class, 'reject'])->name('subscriptions.reject');

    Route::get('/dashboard/themes', [ThemeController::class, 'manage'])->name('dashboard.themes');
    Route::get('/dashboard/themes/{id}/subscription', [SubscriptionController::class, 'manage_subscriptions'])->name('dashboard.theme.subscriptions');


    // History Related
});

Route::get('/apply', function () {
    return view('apply.index');
})->name("apply.index");
