<?php

namespace App\Providers;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
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
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->displayLocale('es')
                ->visible(outsidePanels: true)
                ->outsidePanelRoutes([
                    'profile',
                    'home',
                    // Additional custom routes where the switcher should be visible outside panels
                ])
                ->locales(['es']); // also accepts a closure
        });

    }

    
}
