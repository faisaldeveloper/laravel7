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

        Gate::before(function ($user, $ability) {
            if ($user->hasRole('super-admin')) {
                die('super admin');
                return true;
            }else{
                die('not super admin');
            }
        });

        Gate::define('update-product', function ($user, $product){
            return $user->id == $product->user_id;
        });

        Gate::define('delete-product', function ($user, $product){
            return $user->id == $product->user_id;
        });
    }
}
