<?php

namespace DIYRolePermission\Shared;

use Illuminate\Support\ServiceProvider;

class RolePermissionServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Merge package config with app config
        $this->mergeConfigFrom(
            __DIR__.'/../../config/role-permission.php',
            'role-permission'
        );
    }

    public function boot()
    {
          // Publish config
        $this->publishes([
            __DIR__.'/../../config/role-permission.php' => config_path('role-permission.php'),
        ], 'config');

    }
}
