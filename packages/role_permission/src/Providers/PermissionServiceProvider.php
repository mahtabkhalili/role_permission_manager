<?php
//
namespace Package\RolePermission\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Package\RolePermission\Models\Permission;
use Package\RolePermission\Models\Role;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('role', function () {
            return new Role;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Permission::all()->map(function ($permission) {
         Gate::define($permission->name, function ($user) use ($permission){
             return $user->hasPermission($permission);
         }) ;
        });

        Blade::if('role', function ($role) {
            return auth()->check() && auth()->user()->hasRole($role);
        });
    }
}
