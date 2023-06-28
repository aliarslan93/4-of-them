<?php

namespace App\Providers;

use App\Repositories\Interfaces\RoyalAppInterface;
use App\Repositories\RoyalAppRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            RoyalAppInterface::class,
            RoyalAppRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
