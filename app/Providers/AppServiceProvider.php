<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Destination;
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

        //    View::composer('*', function ($view) {
        //     $destinations = Destination::pluck('name', 'id');
        //     $view->with('destinations', $destinations);
        //     });

        View::composer('*', function ($view) {
            $destinationList = Destination::pluck('name', 'id');
            $view->with('destinationList', $destinationList);
        });
    }
}
