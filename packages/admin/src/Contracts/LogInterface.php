<?php

namespace Rufo\Admin\Contracts;

interface LogInterface
{
    const ASC = 'asc';
    const DESC = 'desc';

    /***
     * save logs
     *
     * @param $message
     * @param $user_id
     * @param $ip
     * @return mixed
     * @internal param $status
     */
    public function put($message,$user_id,$ip);
    /***
     * get logs
     *
     * @param $page '第几页'
     * @param $number '数量'
     * @return mixed
     */
    public function get($page,$number=null);

}