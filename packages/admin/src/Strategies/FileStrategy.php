<?php

namespace Overtrue\EasySms\Strategies;

use Carbon\Carbon;
use Rufo\Ruquest\Contracts\LogInterface;

/**
 * Class FileStrategy.
 */
class FileStrategy implements LogInterface
{

    /***
     * save logs
     *
     * @param $message
     * @param $status
     * @return mixed
     */
    public function put($message, $status)
    {

    }

    /***
     * get logs
     *
     * @param $page '第几页'
     * @param $number '数量'
     * @return mixed
     */
    public function get($page, $number)
    {
        // TODO: Implement get() method.
    }


}
