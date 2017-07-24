<?php

namespace Rufo\Admin\Http\Controllers;

use App\Events\PluginWasEnabled;
use App\Http\Controllers\Controller;
use App\Services\Plugin;
use App\Services\PluginManager;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Rufo\Admin\Models\Setting;
use Rufo\Request\Support\MongoDBHelper;

class LogController extends Controller
{
    public function request()
    {
        $all = $this->traverse(storage_path('logs\https'));
        $temp = [];
        foreach ($all as $k => $v) {
            $temp[$k]['name'] = $this->retrieve($v);
            $temp[$k]['file'] = $v;
        }
        $all=$temp;
        //二维数组逆序
        return view('admin::log.request', compact('all'));
    }

    public function detail($name)
    {
        $file=storage_path('logs\https\\'.$name);
        $str=file_get_contents($file);
        $all=explode('***',$str);
        array_shift($all);
        return view('admin::log.detail', compact('all'));
    }

    public function retrieve($url)
    {
        $array=explode('\\',$url);
        $last=array_last($array);
        return $last;
    }

    public function traverse($path = '.')
    {
        $files = [];
        $current_dir = opendir($path);
        while (($file = readdir($current_dir)) !== false) {
            $sub_dir = $path . DIRECTORY_SEPARATOR . $file;
            if ($file == '.' || $file == '..') {
                continue;
            } else if (is_dir($sub_dir)) {    //如果是目录,进行递归
                $this->traverse($sub_dir);
            } else {
                $files[] = $sub_dir;
            }
        }
        return $files;
    }

}
