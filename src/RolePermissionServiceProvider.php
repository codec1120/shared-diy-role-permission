<?php

namespace DIYRolePermission;

use Illuminate\Support\ServiceProvider;

class RolePermissionServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Merge package config with app config
        $this->mergeConfigFrom(
            __DIR__ . '/config/RolePermission.php',
            'RolePermission'
        );
    }

    public function boot()
    {
        // Allow publishing of config so project can override
        $this->publishes([
            __DIR__ . '/config/RolePermission.php' => config_path('RolePermission.php'),
        ], 'config');
    }
}
