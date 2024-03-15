<?php

namespace App\Providers;

use App\Repositories\{
    CompaniesEloquentORM,
    CompaniesRepositoriesInterface,
    LocationsEloquentORM,
    LocationsRepositoriesInterface,
    SectorEloquentORM,
    SectorsRepositoriesInterface,
    UserEloquentORM,
    UserRepositoriesInterface
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
        );

        $this->app->bind(
            LocationsRepositoriesInterface::class,
            LocationsEloquentORM::class,
        );

        $this->app->bind(
            SectorsRepositoriesInterface::class,
            SectorEloquentORM::class,
        );

        $this->app->bind(
            UserRepositoriesInterface::class,
            UserEloquentORM::class,
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
