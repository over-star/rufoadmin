<?php

namespace Rufo\Admin\Http\Controllers;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Logs;

class AdminController extends Controller
{
    use AuthenticatesUsers;

    public function callback(){
        $socialiteUser = Socialite::driver('github')->user();
        $id=$socialiteUser->getId();;
        $user=User::where('access_token',$id)->first();
        if(!$user){
            $user=new User();
            $user->nickname=$socialiteUser->getNickname();
            $user->name=$socialiteUser->getEmail();
            $user->password=bcrypt($socialiteUser->getEmail());
            $user->email=$socialiteUser->getEmail();
            $user->avatar=$socialiteUser->getAvatar();
            $user->access_token=$id;
            $user->login_type='github';
            $user->auth_info=json_encode($socialiteUser);
            $user->save();
        }
        Auth::loginUsingId($user->id);
        return redirect('/');
    }
    public function githubLogin(){
        return Socialite::driver('github')->redirect();
    }

    public function login()
    {
        return view('admin::admin.login');
    }
    public function error()
    {
        return view('admin::admin.error');
    }
    public function logout(Request $request)
    {
        $user_id=Auth::user()->id;
        $message="用户退出系统";
        $ip=$request->getClientIp();
        Logs::put($message, $user_id,$ip);
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('admin/login');
    }
    public function index()
    {
        return view('admin::index');
    }

    //复用laravel的登录
    public function postLogin(Request $request)
    {
        $this->validateLogin($request);
//        if ($this->hasTooManyLoginAttempts($request)) {
//            $this->fireLockoutEvent($request);
//            return $this->sendLockoutResponse($request);
//        }
        $credentials = $this->credentials($request);
//        if ($this->guard()->attempt($credentials, $request->has('remember'))) {
        if (Auth::attempt($credentials, $request->has('remember'))) {
            $user_id=Auth::user()->id;
            $message="用户登录";
            $ip=$request->getClientIp();
            Logs::put($message, $user_id,$ip);
            return redirect('/dashboard');
        }
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }

    /*
     * Preempts $redirectTo member variable (from RedirectsUsers trait)
     */
    public function redirectTo()
    {
        return '/dashboard';
    }
}
