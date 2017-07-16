<?php

namespace Rufo\Admin\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Permission;
use App\PermissionRole;
use App\Questionnaire;
use App\RoleUser;
use App\User;
use Illuminate\Http\Request;
use Rufo\Admin\Models\Menus;

/***
 * 弃用
 * Class PluginsController
 * @package Rufo\Admin\Http\Controllers
 */
class PluginsController extends Controller
{

    //加载插件资源
    public function loadAsset($name,$where)
    {
        $relative_uri=strtr($where,'-','/');
        $base_path=base_path();
        $file_path = $base_path."/plugins/$name/".$relative_uri;
        if(file_exists($file_path)){
            //$str = file_get_contents($file_path);//将整个文件内容读入到一个字符串中
            return response()->file($file_path);
        }
    }

}
