<?php

namespace Rufo\Admin\Strategies;

use Rufo\Admin\Contracts\LogInterface;
use Rufo\Admin\Models\HandleLog;

/**
 * Class MysqlStrategy.
 */
class MysqlStrategy implements LogInterface
{
    /***
     * save logs
     *
     * @param $message
     * @param $user_id
     * @param $ip
     * @return mixed
     * @internal param $status
     */
    public function put($message, $user_id,$ip)
    {
        $handle_log=new HandleLog();
        $handle_log->message = $message;
        $handle_log->user_id = $user_id;
        $handle_log->ip = $ip;
        return $handle_log->save();
    }

    /***
     * get logs
     *
     * @param $page '第几页'
     * @param $number '数量'
     * @return mixed
     */
    public function get($page,$number=null)
    {
        $handle_log=HandleLog::query()->with('users')->orderBy('id','desc')->paginate($number,['*'], $pageName = 'page', $page);
        return $handle_log;
    }

}
