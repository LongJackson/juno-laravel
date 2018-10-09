<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-prod', function($user){

            return $user->user_role < 3;
        });

        Gate::define('upadte-user', function($user, $u){

            return $user->user_id == $u || $user->user_role < 3;
        });

        Gate::define('del-user', function($user, $u){

            return $user->user_id != $u && $user->user_role < 2;

        });
    }
}
