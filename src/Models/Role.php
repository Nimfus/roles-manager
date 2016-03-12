<?php

namespace Nimfus\RolesManager\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'manager_roles';

    protected $fillable = ['name', 'slug'];

    public function users()
    {
        return $this->belongsToMany(config('roles_manager.models.user'), 'manager_user_roles', 'user_id', 'role_id')->withTimestamps();
    }
}