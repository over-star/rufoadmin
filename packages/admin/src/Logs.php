<?php

namespace Rufo\Admin;

use Rufo\Admin\Contracts\LogInterface;

class Logs
{
    public $log;
    function __construct(LogInterface $log)
    {
        $this->log=$log;
    }
    public function put($message, $user_id,$ip){
        return $this->log->put($message, $user_id,$ip);
    }
    public function get($page,$number=null){
        return $this->log->get($page,$number);
    }
}
