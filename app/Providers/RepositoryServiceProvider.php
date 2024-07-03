<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\emailRepositoryInterface;
use App\Repositories\emailRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(emailRepositoryInterface::class,emailRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
