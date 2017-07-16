<?php

namespace Rufo\Admin\Facades;
use Illuminate\Support\Facades\Facade;

class LogsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'logs';
    }
}
