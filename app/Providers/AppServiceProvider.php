<?php

namespace App\Providers;

use App\Repositories\ThemeRepository;
use App\Repositories\ThemeRepositoryInterface;
use App\Services\ThemeService;
use App\Services\ThemeServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ThemeRepositoryInterface::class, ThemeRepository::class);
        $this->app->bind(ThemeServiceInterface::class, ThemeService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}