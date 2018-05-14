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

        Gate::define("delete-task", function($user, $task) {
            if($user->hasPermission('delete-task')) {
                if($user->is_admin) {
                    return true;
                }
            }
        });
        Gate::define("update-task", function($user, $task) {
            if($user->hasPermission('update-task')) {
                if($user->is_admin) {
                    return true;
                }
            }
        });
        Gate::define('show-task', function ($user, $task) {
            if($user->hasPermission('show-task')) {
                if($user->is_admin){
                    return true;
                }
            }
            return false;
        });
    }
}
