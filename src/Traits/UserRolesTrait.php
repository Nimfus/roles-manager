<?php

namespace Nimfus\RolesManager\Traits;

trait UserRolesTrait
{

    /**
     * @return mixed
     */
    public function roles()
    {
        return $this->belongsToMany(config('roles_manager.models.role'), 'manager_user_roles', 'user_id', 'role_id')->withTimestamps();
    }

    /**
     * @return mixed
     */
    public function role()
    {
        return $this->hasOne(config('roles_manager.models.role'), 'id');
    }

    /**
     * @param $roleName
     * @return bool
     */
    public function hasRole($roleName)
    {
        foreach ($this->roles as $role) {
            if($role->name == $roleName) {
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