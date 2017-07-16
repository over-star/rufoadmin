<?php

namespace Rufo\Admin;

use App\Permission;
use Rufo\Admin\Models\Menus;

class Admin
{
    public function routes()
    {
        require __DIR__ . '/routes/admin.php';
    }

    /***
     * 添加后台菜单
     *
     * @param $title "标题"
     * @param $url "菜单路由"
     * @param int $parent_menu_id "上级菜单id"
     * @param bool $is_create_permission "是否创建对应权限"
     * @param string $permission_name "权限的名字"
     * @return mixed
     */
    public function add_menu($title, $url, $parent_menu_id=0,$is_create_permission = false,$permission_name='')
    {
        $menu=new Menus();
        if($is_create_permission){
            $permission=new Permission();
            $permission->name=$url;
            $permission->display_name=$permission_name;
            $permission->save();
            $menu->permission_id=$permission->id;
        }else{
            //7表示浏览后台
            $menu->permission_id=7;
        }
        $menu->name=$title;
        $menu->url=$url;
        $menu->active_url=$url;
        $menu->is_system=0;
        $menu->parent_id=$parent_menu_id;
        $menu->save();
        return $menu->id;
    }

    //删除后台菜单
    public function delete_menu($id)
    {
        if(is_numeric($id)){
            return Menus::where('id',$id)->delete();
        }
        $menu_id=Menus::where('name',$id)->first();
        if($menu_id){
            return $menu_id->delete();
        }
        return false;
    }

}
