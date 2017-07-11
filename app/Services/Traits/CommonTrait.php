<?php

/*
 * This file is part of the overtrue/easy-sms.
 * (c) overtrue <i@overtrue.me>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Services\Traits;

use App\Models\PaymentOrder;
use App\Models\ScoreGoodsOrder;
use App\Models\ScorePay;
use App\Models\ScorePayOrder;
use App\Models\UserInfo;
use App\Models\Wallet;
use App\Services\Score;
use App\Services\ScoreAward;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Psr\Http\Message\ResponseInterface;

trait CommonTrait
{
    /**
     * 获取两个经纬度之间的距离
     * @param $lat1
     * @param $lng1
     * @param $lat2
     * @param $lng2
     * @param int $accuracy 精度，默认km，1000则为m
     * @return float    保留两位小数
     */
    public function getUserDistance($lat1, $lng1, $lat2, $lng2, $accuracy = 1){
        //将角度转为狐度
        $radLat1=deg2rad((double)$lat1);//deg2rad()函数将角度转换为弧度
        $radLat2=deg2rad((double)$lat2);
        $radLng1=deg2rad((double)$lng1);
        $radLng2=deg2rad((double)$lng2);
        $a=$radLat1-$radLat2;
        $b=$radLng1-$radLng2;
        $s=2*asin(sqrt(pow(sin($a/2),2)+cos($radLat1)*cos($radLat2)*pow(sin($b/2),2)))*6378.137*$accuracy;
        return round($s,2)?:99999*$accuracy;
    }

    /***
     * 二维数组排序
     * @param $multi_array "原数组"
     * @param $sort_key  "排序key"
     * @param int $sort  "升序是降序"
     * @return bool|array
     */
    public function multi_array_sort($multi_array,$sort_key,$sort=SORT_ASC){
        if($multi_array&&is_array($multi_array)){
            foreach ($multi_array as $row_array){
                if(is_array($row_array)){
                    $key_array[] = $row_array[$sort_key];
                }else{
                    return false;
                }
            }
        }else{
            return false;
        }
        array_multisort($key_array,$sort,$multi_array);
        return $multi_array;
    }


    /**
     * 数组根据父id生成树
     * @param array $data 数组数据
     * @param integer $pid 父id的值
     * @param string $key id在$data数组中的键值
     * @param string $pKey 父id在$data数组中的键值
     * @param string $childKey
     * @param int $maxDepth 最大递归深度，防止无限递归
     * @return array 重组后的数组
     */
    public function getTree($data, $pid = 0, $key = 'id', $pKey = 'parent_id', $childKey = 'children', $maxDepth = 0){
        static $depth = 0;
        $depth++;
        if (intval($maxDepth) <= 0)
        {
            $maxDepth = count($data) * count($data);
        }
        $tree = array();
        foreach ($data as $rk => $rv)
        {
            if ($rv[$pKey] == $pid)
            {
                $rv[$childKey] = $this->getTree($data, $rv[$key], $key, $pKey, $childKey, $maxDepth);
                $tree[] = $rv;
            }
        }
        return $tree;
    }

    /***
     * 数组失去key
     *
     * @param $finally
     * @return array
     */
    public function array_lost_key($finally){
        $temp=[];
        foreach ($finally as $v){
            $temp[]=$v;
        }
        return $temp;
    }

}
