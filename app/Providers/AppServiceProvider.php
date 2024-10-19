<?php

namespace App\Providers;

use App\Models\Questionnaire;
use Illuminate\Support\Facades\Gate;
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
        // Mengirimkan variabel questionnaire ke semua views
    view()->composer('layouts.app', function ($view) {
        // Ambil questionnaire sesuai kebutuhan, contoh: yang pertama
        $questionnaire = Questionnaire::first(); // Ganti sesuai kebutuhan
        $view->with('questionnaire', $questionnaire);
    });
        Gate::before(function($user, $ability) {
            if($user->hasRole('super_admin')) {
                return true;
            }
        });

    }
}
