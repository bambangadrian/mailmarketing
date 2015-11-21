<?php
namespace MailMarketing\Contracts\Auth;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserAcl trait.
 *
 * @package MailMarketing\Contracts\Auth
 */
trait UserAcl
{

    /**
     * Can Checks a Permission
     *
     * @param  string $perm Name of a permission
     *
     * @return boolean true if has permission, otherwise false
     */
    public function can($perm = null)
    {
        if ($perm) {
            return $this->checkPermission($this->getArray($perm));
        }
        return false;
    }

    /**
     * hasPermission Checks if has a Permission (Same as 'can')
     *
     * @param  string $perm Name of a permission parameter.
     *
     * @return boolean true if has permission, otherwise false
     */
    public function hasPermission($perm = null)
    {
        return $this->can($perm);
    }

    /**
     * Checks if has a role
     *
     * @param  string $role Name of role parameter.
     *
     * @return boolean true if has permission, otherwise false
     */
    public function hasRole($role = null)
    {
        if (is_null($role)) {
            return false;
        }
        return strtolower($this->role->role_slug) === strtolower($role);
    }

    /**
     * Check if user has given role
     *
     * @param  string $role role_slug
     *
     * @return boolean TRUE or FALSE
     */
    public function is($role)
    {
        return $this->role->role_slug === $role;
    }

    /**
     * Check if user has permission to a route
     *
     * @param  String $routeName
     *
     * @return Boolean true/false
     */
    public function hasRoute($routeName)
    {
        $route = app('router')->getRoutes()->getByName($routeName);
        if ($route) {
            $action = $route->getAction();
            if (isset($action['permission'])) {
                $array = explode('|', $action['permission']);
                return $this->checkPermission($array);
            }
        }
        return false;
    }

    /**
     * Check if a top level menu is visible to user
     *
     * @param  String $perm
     *
     * @return Boolean true/false
     */
    public function canSeeMenuItem($perm)
    {
        return $this->can($perm) || $this->hasAnylike($perm);
    }

    /**
     * Make string to array if already not
     *
     * @param  string|array $perm String/Array
     *
     * @return Array
     */
    protected function getArray($perm)
    {
        return is_array($perm) ? $perm : explode('|', $perm);
    }

    /**
     * Check if the permission matches with any permission user has
     *
     * @param  array $perm Name of a permission (one or more separated with |)
     *
     * @return boolean true if permission exists, otherwise false
     */
    protected function checkPermission(Array $permArray = [])
    {
        $perms = $this->role->permissions->fetch('permission_slug');
        $perms = array_map('strtolower', $perms->toArray());
        return count(array_intersect($perms, $permArray));
    }

    /**
     * Checks if user has any permission in this group
     *
     * @param  String $perm  Required Permission
     * @param  Array  $perms User's Permissions
     *
     * @return Boolean true/false
     */
    protected function hasAnylike($perm)
    {
        $parts = explode('_', $perm);
        $requiredPerm = array_pop($parts);
        $perms = $this->role->permissions->fetch('permission_slug');
        foreach ($perms as $perm) {
            if (ends_with($perm, $requiredPerm)) {
                return true;
            }
        }
        return false;
    }
}
