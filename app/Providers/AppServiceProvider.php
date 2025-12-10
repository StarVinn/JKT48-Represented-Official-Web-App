<?php

namespace App\Providers;

use App\Services\Jkt48ScraperService;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
            $this->app->singleton(Jkt48ScraperService::class, function () {
            return new Jkt48ScraperService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Carbon::setLocale('id'); // Bahasa Indonesia
        setlocale(LC_TIME, 'id_ID.utf8'); // Opsional tambahan
    }
}
