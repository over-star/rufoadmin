<?php

namespace Rufo\Admin\Http\Middleware;

use App\Permission;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;
class RufoAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //判断用户有没有登录
        if (!Auth::guest()) {
            $user_id=Auth::user()->id;
            if($user_id!=1){
                $user = User::where('id', '=', $user_id)->first();
                $is_ok=$user->can('view-backend');
                if(!$is_ok){
                    return redirect()->guest('admin/error')->withErrors('你没有访问后台的权限!');//跳转到登陆界面
                }
                //判断当前url是否有权限保护
                $uri=$request->path();
                $can_view=Permission::where('name',$uri)->first();
                if($can_view){
                    if(!$user->can($uri)){
                        return redirect('admin/error')->withErrors('你没有权限!');//跳转到登陆界面
                    }
                }
            }
            return $next($request);
        }
        return redirect(route('admin.login'));
    }
}
