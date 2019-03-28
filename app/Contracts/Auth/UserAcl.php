<?php
namespace MailMarketing\Contracts\Auth;

/**
 * Class UserAcl trait.
 *
 * @package MailMarketing\Contracts\Auth
 */
trait UserAcl
{

    /**
     * Checks if has permission.
     *
     * @param  string $permission Name of a permission.
     *
     * @return boolean true if has permission, otherwise false
     */
    public function hasPermission($permission = null)
    {
        return $permission !== null and $this->checkPermission($this->getArray($permission));
    }

    /**
     * Check if has role.
     *
     * @param string $role Role parameter.
     *
     * @return boolean
     */
    public function hasRole($role)
    {
        $roles = array_map(
            function ($roleName) {
                return strtolower(trim($roleName));
            },
            $this->roles->pluck('Ur_Slug')->toArray()
        );

        return in_array(strtolower(trim($role)), $roles, true);
    }

    /**
     * Make string to array if already not.
     *
     * @param  array|string $data Data parameter.
     *
     * @return array
     */
    protected function getArray($data)
    {
        return array_unique(
            array_map(
                function ($slug) {
                    return strtolower(trim($slug));
                },
                is_array($data) ? $data : explode('|', $data)
            )
        );
    }

    /**
     * Check if the permission matches with any permission user has.
     *
     * @param  array $permissionSlug permission slug of a permission.
     *
     * @return boolean true if permission exists, otherwise false
     */
    protected function checkPermission(array $permissionSlug)
    {
        $permissions = $this->getAllPermissionsFormAllRoles();
        $result = array_intersect($permissions, $permissionSlug);

        return count($permissionSlug) === count($result);
    }

    /**
     * Get all permission slugs from all permissions of all roles.
     *
     * @return array of permission slugs
     */
    protected function getAllPermissionsFormAllRoles()
    {
        $permissions = $this->roles->load('permissions')->pluck('permissions')->toArray();

        return array_map(
            'strtolower',
            array_unique(
                array_flatten(
                    array_map(
                        function ($permission) {
                            return array_pluck($permission, 'Pm_Slug');
                        },
                        $permissions
                    )
                )
            )
        );
    }
}
