<?php

namespace DIYRolePermission\Shared\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasRoleAndPermissions
{
     /**
     * Optionally: check if user has a specific role
     */
    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }

    /**
     * Optionally: check if user has any of role
    */
    public function hasAnyRole(array $roles): bool
    {
        return in_array($this->role, $roles);
    }

    /**
     * Check if user has the given permission(s)
     *
     * @param string|array $permissions Single or multiple permission keys
     * @param bool $requireAll True = all permissions required (AND), False = any permission (OR) user has ALL permission
     * @return bool
     */
    public function hasPermission(string|array $permissions, bool $requireAll = false): bool
    {
        $userRolePermissions = config('rolePermission.role_permission');
        $permissions = (array) $permissions;
        $rolePermissions = $userRolePermissions[$this->role] ?? [];

        if ($requireAll) {
            return empty(array_diff($permissions, $rolePermissions));
        } else {
            return (bool) array_intersect($permissions, $rolePermissions) || in_array('all', $rolePermissions);
        }
    }

    
    // Mutators
    public function getPermissionsAttribute(): array
    {
        return config('rolePermission.permissions')[$this->role];
    }
}
