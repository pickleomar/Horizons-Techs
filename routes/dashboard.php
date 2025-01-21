<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionController;


//
Route::middleware('auth', "role:subscriber",)->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/history', [DashboardController::class, 'history'])->name('dashboard.history');
    Route::get('/dashboard/subscriptions', [SubscriptionController::class, 'index'])->name('dashboard.subscriptions');
    // Create a subscription
    Route::post('/subscriptions/store', [SubscriptionController::class, 'store'])->name('subscriptions.store');
    // Remove Subscription
    Route::delete('/subscriptions/{theme_id}', [SubscriptionController::class, 'destroy'])->name('subscriptions.destroy');
    //for superadmins to create subs
    Route::get('/subscription/create', [SubscriptionController::class, 'create'])->name('subscription.create');
});

Route::get('/apply', function () {
    return view('apply.index');
})->name("apply.index");