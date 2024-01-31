<?php

namespace App\Providers;

use App\Repositories\{
    CompaniesEloquentORM,
    CompaniesRepositoriesInterface,
    LocationsEloquentORM,
    LocationsRepositoriesInterface
};
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
            CompaniesEloquentORM::class,

            LocationsRepositoriesInterface::class,
            LocationsEloquentORM::class
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
