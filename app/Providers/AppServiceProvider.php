<?php

namespace App\Providers;

use App\Interfaces\LogRepositoryInterface;
use App\Interfaces\OrderRepositoryInterface;
use App\Repositories\LogRepository;
use App\Repositories\OrderRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\ProductRepositoryInterface;
use App\Repositories\ProductRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(LogRepositoryInterface::class, LogRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
