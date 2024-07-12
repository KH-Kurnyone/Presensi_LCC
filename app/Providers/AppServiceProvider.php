<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('Admin', function(User $user) {
            return $user->role === 'Admin';
        });

        Gate::define('Petugas', function(User $user) {
            return $user->role === 'Petugas';
        });

        Gate::define('Viewer', function(User $user) {
            return $user->role === 'Viewer';
        });

        Gate::define('Mahasiswa', function(User $user) {
            return $user->role === 'Mahasiswa';
        });
    }
}
