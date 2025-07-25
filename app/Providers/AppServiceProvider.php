<?php

namespace App\Providers;

use App\Interfaces\HobbyRepositoryInterface;
use App\Interfaces\LogRepositoryInterface;
use App\Interfaces\OrderRepositoryInterface;
use App\Interfaces\PhoneNumberRepositoryInterface;
use App\Interfaces\profileRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\HobbyRepository;
use App\Repositories\LogRepository;
use App\Repositories\OrderRepository;
use App\Repositories\PhoneNumberRepository;
use App\Repositories\profileRepository;
use App\Repositories\UserRepository;
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
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(HobbyRepositoryInterface::class, HobbyRepository::class);
        $this->app->bind(profileRepositoryInterface::class, profileRepository::class);
        $this->app->bind(PhoneNumberRepositoryInterface::class, PhoneNumberRepository::class);





    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
