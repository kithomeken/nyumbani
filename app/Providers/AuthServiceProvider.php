<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /**
         * Define Gate for admin user role
         * Returns true if user role is set to admin
         **/ 
        Gate::define('isAdmin', function($user) {
            return $user->user_access == 'admin';
        });

        /**
         * Define Gate for a standard user role
         * Returns true if user role is set to editor
         **/ 
        Gate::define('isEditor', function($user) {
            return $user->user_access == 'standard';
        });
    }
}
