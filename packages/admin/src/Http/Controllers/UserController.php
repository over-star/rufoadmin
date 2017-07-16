<?php

namespace Rufo\Admin\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Permission;
use App\PermissionRole;
use App\Role;
use App\RoleUser;
use App\User;
use Illuminate\Http\Request;
use Rufo\Admin\Models\Menus;

class UserController extends Controller
{

    public function permissionIndex()
    {
        $all=Permission::orderBy('id','desc')->paginate();
        return view('admin::user.permission-index',compact('all'));
    }
    public function permissionCreate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:permissions',
            'display_name' => 'required|max:255',
            'description' => 'required',
        ]);
        $permissions=new Permission();
        $permissions->name=$request->get('name');
        $permissions->display_name=$request->get('display_name');
        $permissions->description=$request->get('description');
        $permissions->save();
        return redirect('admin/permission/index');
    }
    public function permissionEdit($id,Request $request)
    {
        $permission =Permission::find($id);
        if ($request->isMethod('post')) {
            $permission->name=$request->get('name');
            $permission->display_name=$request->get('display_name');
            $permission->description=$request->get('description');
            $permission->save();
            return redirect('admin/permission/index');
        }
        return view('admin::user.permission-edit',compact('permission','id'));
    }
    public function permissionDestroy($id,Request $request)
    {
        if(!is_numeric($id)) return false;
        //Permission::query()->where('id',$id)->delete();
        Permission::destroy($id);
        return redirect('admin/permission/index');
    }

    public function roleIndex()
    {
        $all=Role::orderBy('id','desc')->paginate();
        return view('admin::user.role-index',compact('all'))->withPermissions(Permission::get());
    }
    public function roleCreate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:permissions',
            'display_name' => 'required|max:255',
            'description' => 'required',
        ]);
        $role=new Role();
        $role->name=$request->get('name');
        $role->display_name=$request->get('display_name');
        $role->description=$request->get('description');
        $role->save();
        $role->assignPermission($request->get('permissions'));
        return redirect('admin/role/index');
    }
    public function roleEdit($id,Request $request)
    {
        $role =Role::find($id);
        if ($request->isMethod('post')) {
            $role->name=$request->get('name');
            $role->display_name=$request->get('display_name');
            $role->description=$request->get('description');
            $role->save();
            PermissionRole::where('role_id',$id)->delete();
            $role->assignPermission($request->get('permissions'));
            return redirect('admin/role/index');
        }
        return view('admin::user.role-edit')
            ->withRole($role)
            ->withPermission(Permission::get())
            ->withHaspremission(PermissionRole::select('permission_id')->where('role_id',$id)->get())
            ->withId($id);
    }
    public function roleDestroy($id,Request $request)
    {
        if(!$id) return false;
        Role::destroy($id);
        PermissionRole::where('role_id',$id)->delete();
        return redirect('admin/role/index');
    }

    public function userIndex(){
        $roles=Role::all();
        $all=User::orderBy('id','desc')->paginate();
        return view('admin::user.user-index',compact('roles','all'));
    }
    public function userCreate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:users',
            'password' => 'required|max:255',
            'email' => 'required|unique:users',
        ]);
        $user=new User();
        $user->name=$request->get('name');
        $user->password=bcrypt($request->get('password'));
        $user->email=$request->get('email');
        $user->save();
        $user->assignRole($request->get('roles'));
        return redirect('admin/user/index');
    }
    public function userEdit($id,Request $request)
    {
        $user =User::find($id);
        if ($request->isMethod('post')) {
            $user->name=$request->get('name');
            if(trim($request->get('password'))){
                $user->password=$request->get('password');
            }
            $user->email=$request->get('email');
            $user->save();
            RoleUser::where('user_id',$id)->delete();
            $user->assignRole($request->get('roles'));
            return redirect('admin/user/index');
        }
        $roles=Role::all();
        return view('admin::user.user-edit')
            ->withUser($user)
            ->withRoles($roles)
            ->withHasroles(RoleUser::select('role_id')->where('user_id',$id)->get())
            ->withId($id);
    }
    public function userDestroy($id,Request $request)
    {
        if(!$id) return false;
        User::destroy($id);
        RoleUser::where('user_id',$id)->delete();
        return redirect('admin/user/index');
    }

    public function menuIndex(){
        $all=Menus::orderBy('id','desc')->paginate();
        $menus=Menus::get();
        return view('admin::user.menu-index',compact('menus','all'))->withPermissions(Permission::get());
    }
    public function menuCreate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:users',
            'url' => 'required|max:255',
        ]);
        $all=$request->all();
        $menu=new Menus();
        $menu->name         = $all['name'];
        $menu->url          = $all['url'];
        $menu->icon         = $all['icon'];
        $menu->active_url   = $all['active_url'];
        $menu->permission_id= $all['permission_id'];
        $menu->is_system    = isset($all['is_system'])?$all['is_system']:0;
        $menu->parent_id    = $all['parent_id'];
        $menu->save();
        return redirect('admin/menu/index');
    }
    public function menuEdit($id,Request $request)
    {
        $menu =Menus::find($id);
        $menus=Menus::get();
        if ($request->isMethod('post')) {
            $all=$request->all();
            $menu->name         = $all['name'];
            $menu->url          = $all['url'];
            $menu->icon         = $all['icon'];
            $menu->active_url   = $all['active_url'];
            $menu->permission_id= $all['permission_id'];
            $menu->is_system    = isset($all['is_system'])?$all['is_system']:0;
            $menu->parent_id    = $all['parent_id'];
            $menu->save();
            return redirect('admin/menu/index');
        }
        return view('admin::user.menu-edit')
            ->withMenu($menu)
            ->withMenus($menus)
            ->withPremissions(Permission::get())
            ->withId($id);
    }
    public function menuDestroy($id,Request $request)
    {
        if(!$id) return false;
        Menus::destroy($id);
        return redirect('admin/user/index');
    }
}
