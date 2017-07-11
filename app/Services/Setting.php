<?php

namespace App\Services;

use ArrayAccess;
use Illuminate\Support\Arr;
use Illuminate\Contracts\Support\Arrayable;

/**
 * @property string $name
 * @property string $description
 * @property string $title
 * @property array  $author
 */
class Setting
{

    public function get($key)
    {
       return \Rufo\Admin\Models\Setting::query()->where('key',$key)->value('value');
    }

}
