<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use App\Models\Activity;
use Illuminate\Support\Facades\Gate;

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
        Paginator::defaultView('pagination::default');

        Gate::define('edit-session', function (User $user) {
            return $user->is_admin;
        });

        Gate::define('edit-activity', function (User $user, Activity $activity) {
            return $user->is_admin OR $activity->user_id;
        });

        Gate::define('delete-activity', function (User $user, Activity $activity) {
            return $user->is_admin OR $activity->user_id;
        });
    }
}
