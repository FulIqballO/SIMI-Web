<?php

namespace App\Providers;

use App\Models\Payment;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
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
        Paginator::useBootstrap();

        Route::bind('payment', function ($value) {
            return Payment::where('invoice_code', $value)->firstOrFail();
        });
    }
}
