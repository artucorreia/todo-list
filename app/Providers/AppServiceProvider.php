<?php

namespace App\Providers;

use App\View\Components\Forms\DateFilter;
use App\View\Components\Forms\EditPassword;
use App\View\Components\Forms\EditProfile;
use App\View\Components\Util\ArrowBackPage;
use Illuminate\Support\Facades\Blade;
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
        // User
        Blade::component('edit-profile-form', EditProfile::class);
        Blade::component('edit-password-form', EditPassword::class);

        // Dashboard
        Blade::component('date-filter-form', DateFilter::class);

        // Util
        Blade::component('arrow-back-page', ArrowBackPage::class);
    }
}
