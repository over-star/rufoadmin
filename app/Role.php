<?php

namespace App;

use Laratrust\LaratrustRole;

class Role extends LaratrustRole
{
    //分配权限
    public function assignPermission($permission_id){
        $this->attachPermissions($permission_id);
    }
}
