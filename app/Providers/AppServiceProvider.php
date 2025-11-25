<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
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
        Paginator::defaultView('vendor.pagination.default');

        Gate::define('manage-payment', function (User $user) {
            return $user->email === 'admin@boss.com' || $user->name === 'admin';
        });
        Gate::define('edit-flat', function (User $user) {
            return $user->email === 'admin@boss.com' || $user->name === 'admin';
        });
    }
}
