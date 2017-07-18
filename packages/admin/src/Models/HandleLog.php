<?php

namespace Rufo\Admin\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class HandleLog extends Model
{
    protected $table='handle_log';

    public function users(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
