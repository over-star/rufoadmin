<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Cache\RateLimiter;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Http\Response;

class Token
{
    /**
     * The router instance.
     *
     * @var \Illuminate\Contracts\Routing\Registrar
     */
    protected $router;

    /**
     * Create a new bindings substitutor.
     *
     * @param  \Illuminate\Contracts\Routing\Registrar  $router
     * @return void
     */
    public function __construct(RateLimiter $limiter)
    {
        $this->limiter = $limiter;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token=$this->getToken($request);
        $this->loginAuth($token);
        return $next($request);
    }
    //get token
    protected function getToken($request)
    {
        $token = $request->header('token');
        if(!$token){
            dd(1);
        }
        return $token;
    }
    //login user
    public function loginAuth($token){
        if(env('API_TYPE','one')=='one'){
            //单端登录，修改token
        }
        //多端登录，不修改token

    }

}