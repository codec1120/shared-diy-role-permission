<?php

namespace DIYRolePermission\Shared;

use Illuminate\Support\ServiceProvider;
use DIYRolePermission\Shared\Services\RolePermissionService;

class RolePermissionServiceProvider extends ServiceProvider
{
    private string $configPath = __DIR__ . '/../config/rolePermission.php';

    public function boot(): void
    {
        
        if (function_exists('config_path')) {
            $this->publishes([
                $this->configPath => config_path('rolePermission.php'),
            ], 'config');
        }
    }

    public function register(): void
    {
        if (file_exists($this->configPath)) {
            $this->mergeConfigFrom($this->configPath, 'rolePermission');
        }

        // Bind service in container
        $this->app->singleton(RolePermissionService::class, function ($app) {
            return new RolePermissionService();
        });
    }
}
