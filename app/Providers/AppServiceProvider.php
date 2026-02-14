<?php

namespace App\Providers;
use App\Models\CompanySetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (Schema::hasTable('company_settings')) {
            $settings = Cache::remember('company_settings', 60 * 60 * 24, function () {
                return CompanySetting::first() ?? new CompanySetting();
            });

            View::share('site_settings', $settings);
        }
    }
}
