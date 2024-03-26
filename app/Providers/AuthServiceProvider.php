<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Locations;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Verifica se o usuário possui registros em locations
        Auth::macro('hasLocations', function () {
            if (Auth::check()) {
                $userId = Auth::id();
                $locationsDoUsuario = Locations::where('user_id', $userId)->exists();
                return $locationsDoUsuario;
            }
            return false;
        });

        Auth::macro('sector_origin', function () {
            if (Auth::check()) {
                $userId = Auth::id();
                $locationsDoUsuario = Locations::where('user_id', $userId)->exists();
                return $locationsDoUsuario;
            }
            return false;
        });
    }
}
