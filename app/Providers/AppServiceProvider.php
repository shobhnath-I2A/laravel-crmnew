<?php

namespace App\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Destination;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Event;

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

        Broadcast::routes(['middleware' => ['web', 'auth']]);
        require base_path('routes/channels.php');

        View::composer('*', function ($view) {
            $destinationList = Destination::pluck('name', 'id');
            $view->with('destinationList', $destinationList);

            if (auth()->check()) {
                auth()->user()->loadMissing('permissions', 'role.branch');
            }
        });

        /*
        |--------------------------------------------------------------------------
        | User Logout - Make User Offline Immediately
        |--------------------------------------------------------------------------
        */

        Event::listen(
            Logout::class,
            function (Logout $event) {
                if ($event->user) {
                    $event->user->updateQuietly([
                        'last_seen_at' => null,
                    ]);
                }
            }
        );


    }
}
