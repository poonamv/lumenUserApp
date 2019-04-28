<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register('Wn\Generators\CommandsServiceProvider');
            // Bind the UserRepositoryInterface with UsrRepository class - repository pattern
            $this->app->bind('App\Repositories\UserRepositoryInterface', 'App\Repositories\UserRepository');
        }
    }

    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
