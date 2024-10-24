<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\ProductController;
use App\Interfaces\ReadProductRepositoryInterface;
use App\Repositories\ReadProductRepository;
use App\Interfaces\WriteProductRepositoryInterface;
use App\Repositories\WriteProductRepository;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->when(ProductController::class)
            ->needs(ReadProductRepositoryInterface::class)
            ->give(function() {
                return new ReadProductRepository;
            });

            $this->app->when(ProductController::class)
            ->needs(WriteProductRepositoryInterface::class)
            ->give(function() {
                return new WriteProductRepository;
            });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
