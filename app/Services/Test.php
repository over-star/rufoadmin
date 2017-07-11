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
class Test
{

    public function test()
    {
        dd('门面测试！');
    }

}
