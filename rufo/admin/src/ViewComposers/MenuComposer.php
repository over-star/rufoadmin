<?php
namespace Rufo\Admin\ViewComposers;

use App\PermissionRole;
use App\RoleUser;
use Illuminate\Contracts\View\View;
use Auth;
use Rufo\Admin\Models\Menus;

class MenuComposer
{
    /**
    * 将数据绑定到视图。
    * @param  View  $view
    * @return void
    */
    public function compose(View $view)
    {
//        //第一步展示出菜单
        $user=Auth::user();
        $menu=Menus::get()->toArray();
        $menu=$this->getTree($menu,0,'id','parent_id');
        if($user->id!=1){
            //获取当前用户角色
            $roles=RoleUser::where('user_id',$user->id)->get()->toArray();
            $roles = array_column($roles, 'role_id');
            //根据角色获取权限
            $PermissionRole=PermissionRole::whereIn('role_id', $roles)->get()->toArray();
            $PermissionRole = array_column($PermissionRole, 'permission_id');
            //先判断顶级是否出现
            foreach ($menu as $k=>$v){
                if(!in_array($v['permission_id'],$PermissionRole)&&$v['permission_id']>0){
                    unset($menu[$k]);
                }else if(isset($v['children'])){
                    foreach ($v['children'] as $kk=>&$vv){
                        if(!in_array($vv['permission_id'],$PermissionRole)&&$vv['permission_id']>0){
                            unset($menu[$k]['children'][$kk]);
                        }
                    }
                }
            }
        }
        $view->with('menu_info',$menu);
    }


    //数组转化为二叉树
    protected function arrayToTree($sourceArr, $key='id', $parentKey='pid', $childrenKey='children')
    {
        $tempSrcArr = [];
        $allRoot = TRUE;
        foreach ($sourceArr as  $v)
        {
            $isLeaf = TRUE;
            foreach ($sourceArr as $cv )
            {
                if (($v[$key]) != $cv[$key])
                {
                    if ($v[$key] == $cv[$parentKey])
                    {
                        $isLeaf = FALSE;
                    }
                    if ($v[$parentKey] == $cv[$key])
                    {
                        $allRoot = FALSE;
                    }
                }
            }
            if ($isLeaf)
            {
                $leafArr[$v[$key]] = $v;
            }
            $tempSrcArr[$v[$key]] = $v;
        }
        if ($allRoot)
        {
            return $tempSrcArr;
        }
        else
        {
            unset($v, $cv, $sourceArr, $isLeaf);
            foreach ($leafArr as  $v)
            {
                if (isset($tempSrcArr[$v[$parentKey]]))
                {
                    $tempSrcArr[$v[$parentKey]][$childrenKey] = (isset($tempSrcArr[$v[$parentKey]][$childrenKey]) && is_array($tempSrcArr[$v[$parentKey]][$childrenKey])) ? $tempSrcArr[$v[$parentKey]][$childrenKey] : array();
                    array_push ($tempSrcArr[$v[$parentKey]][$childrenKey], $v);
                    unset($tempSrcArr[$v[$key]]);
                }
            }
            unset($v);
            return $this->arrayToTree($tempSrcArr, $key, $parentKey, $childrenKey);
        }
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

}
