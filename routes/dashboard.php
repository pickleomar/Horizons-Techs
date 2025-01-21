<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionController;


//
Route::middleware('auth', "role:subscriber",)->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/subscriptions', [SubscriptionController::class, 'index'])->name('dashboard.subscriptions');
    // Create a subscription
    Route::post('/subscriptions/store', [SubscriptionController::class, 'store'])->name('subscriptions.store');
    // Remove Subscription
    Route::delete('/subscriptions/{theme_id}', [SubscriptionController::class, 'destroy'])->name('subscriptions.destroy');
    //for superadmins to create subs
    Route::get('/subscription/create', [SubscriptionController::class, 'create'])->name('subscription.create');


    // History Related
    Route::get('/dashboard/history', [HistoryController::class, 'index'])->name('dashboard.history');
});

Route::get('/apply', function () {
    return view('apply.index');
})->name("apply.index");