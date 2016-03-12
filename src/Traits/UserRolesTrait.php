<?php

namespace Nimfus\RolesManager\Traits;

trait UserRolesTrait
{

    /**
     * @return mixed
     */
    public function roles()
    {
        return $this->belongsToMany(config('roles_manager.models.role'))->withTimestamps();
    }

    /**
     * @param $roleName
     * @return bool
     */
    public function hasRole($roleName)
    {
        foreach ($this->roles as $role) {
            if($role == $roleName) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param $role
     * @return mixed
     */
    public function assignRole($role)
    {
        return $this->roles()->attach($role);
    }

    /**
     * @param $role
     * @return mixed
     */
    public function removeRole($role)
    {
        return $this->roles()->detach($role);
    }
}