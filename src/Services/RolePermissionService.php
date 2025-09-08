<?php

namespace DIYRolePermission\Shared\Services;

class RolePermissionService
{
    /**
     * Check if a given role has a given permission.
     */
    public function check(string $role, string $permission): bool
    {
        $permissions = config('rolePermission.permissions', []);

        // Role not defined
        if (!isset($permissions[$role])) {
            return false;
        }

        $rolePermissions = $permissions[$role];

        // If role has wildcard permission
        if (in_array('*', $rolePermissions)) {
            return true;
        }

        return in_array($permission, $rolePermissions);
    }

    /**
     * Get all permissions for a given role.
     */
    public function all(string $role): array
    {
        return config("rolePermission.permissions.$role", []);
    }
}
