<?php

namespace App\Providers;

use App\Models\Report;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('admin', function (User $user) {
            return $user->IsAdmin;
        });

        Gate::define('view-report', function (User $user, Report $report) {
            return $user->id === $report->user_id;
        });
    }
}
