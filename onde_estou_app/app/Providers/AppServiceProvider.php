<?php

namespace App\Providers;

use App\Repositories\CompaniesRepositoriesInterface;
use CompaniesEloquentORM;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            CompaniesRepositoriesInterface::class,
            CompaniesEloquentORM::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
