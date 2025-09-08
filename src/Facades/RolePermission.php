<?php

namespace DIYRolePermission\Shared\Facades;

use Illuminate\Support\Facades\Facade;
use DIYRolePermission\Shared\Services\RolePermissionService;

class RolePermission extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return RolePermissionService::class;
    }
}
