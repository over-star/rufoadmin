<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //分配角色给用户
    public function assignRole($role_id){
        // parameter can be an Role object, array, id or the role string name
        $this->attachRoles($role_id);
    }
    //分配权限给用户
    public function assignPermission($permission_id){
        // parameter can be an Permission object, array, id or the permission string name
        $this->attachPermissions($permission_id);
    }


}
