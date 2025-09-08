<?php

namespace DIYRolePermission\Shared;

use Illuminate\Support\ServiceProvider;

class RolePermissionServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Publish config
        $this->publishes([
            __DIR__.'/../../config/rolePermission.php' => config_path('rolePermission.php'),
        ], 'config');

        // Ensure keys exist
        $this->ensureKeysExist();
    }

    /**
     * Register bindings and merge config
     */
    public function register(): void
    {
        // Merge default config so package works even if host app doesn't publish it
        $this->mergeConfigFrom(
            __DIR__.'/../../config/rolePermission.php',
            'rolePermission'
        );
    }


}
