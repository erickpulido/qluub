<?php

namespace App\Providers;

use App\Interfaces\ReadUserRepositoryInterface;
use App\Interfaces\WriteUserRepositoryInterface;
use App\Repositories\ReadUserRepository;
use App\Repositories\WriteUserRepository;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ReadUserRepositoryInterface::class, ReadUserRepository::class);
        $this->app->bind(WriteUserRepositoryInterface::class, WriteUserRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
