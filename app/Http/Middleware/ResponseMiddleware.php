<?php

namespace App\Http\Middleware;

use Closure;
use Storage;
class ResponseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        //判断是否是debug模式
        if(env('APP_DEBUG')){
            //判断状态吗是否异常
            $uri=$request->getUri();
            $code=$response->getStatusCode();
            if($code!=200){
                //将请求写到log目录下
                $directory=storage_path().'/logs/https';
                if(!is_dir($directory)){
                    //判断文件夹是否存在
                    mkdir($directory);
                }
                $date=date('Y-m-d',time());//日志名称
                $datetime=date('Y-m-d h:i:s',time());//日志内记录时间
                $filename=$directory.'/'.$date.'.log';
                $sizes=1024*10*1024;//日志文件大小,10*1024*1024

                if(file_exists($directory.'/'.$date.'.log')){
                    $file_size=filesize($directory.'/'.$date.'.log');
                    if($file_size > $sizes){
                        $is_=file_exists($directory.'/who_is_log');
                        if(!$is_) {
                            //不存在就创建该文件
                            file_put_contents($directory.'/who_is_log','');
                        }
                        $str=file_get_contents($directory.'/who_is_log');
                        //是否存在正在写的日志
                        if($str){
                            if(file_exists($directory.'/'.$str)){
                                //判断该文件是否满
                                $file_size=filesize($directory.'/'.$str);
                                if($file_size > $sizes){
                                    $gen_time=date('h:i:s',time());
                                    file_put_contents($directory.'/who_is_log',$date.'-'.$gen_time.'.log');
                                    $filename=$directory.'/'.$date.'-'.$gen_time.'.log';
                                }else{
                                    $filename=$directory.'/'.$str;
                                }
                            }else{
                                $gen_time=date('h:i:s',time());
                                $filename=$directory.'/'.$date.'-'.$gen_time.'.log';
                                file_put_contents($directory.'/who_is_log',$date.'-'.$gen_time.'.log');
                            }
                        }else{
                            $gen_time=date('h:i:s',time());
                            $filename=$directory.'/'.$date.'-'.$gen_time.'.log';
                            file_put_contents($directory.'/who_is_log',$date.'-'.$gen_time.'.log');
                        }
                    }
                }
                //将请求信息写入到日志文件中
                $value='['.$datetime.']'.'请求URI:'.$uri.'请求状态:'.$response->getStatusCode().'/'.$request->method();
                $value.=PHP_EOL."********************************************************";
                $type=$response->headers->get('Content-Type');
                if($type=="text/html; charset=UTF-8"){
                    $value.=PHP_EOL.'返回信息:'.'返回为html页面,请登录浏览器查看!'.PHP_EOL;
                }else{
                    $value.=PHP_EOL.'返回信息:'.PHP_EOL.$response->content().PHP_EOL;
                }
                //回去请求的参数
                $value.='请求参数信息信息:';
                $value.=PHP_EOL.$request->getContent();
                $value.=PHP_EOL.'request信息:';
                foreach ($request->headers as $k=>$v){
                    $value.=PHP_EOL.'#'.$k.'==>'.$v[0];
                }
                foreach ($request->headers as $k=>$v){
                    if($k=='content-type'&&strstr($v[0],'multipart/form-data;')){
                        $value.=PHP_EOL.'上传文件信息:';
                        foreach ($_FILES as $k1=>$v1){
                            $value.=PHP_EOL.'##文件名:'.$k1;
                            foreach ($v1 as $q=>$w){
                                if(is_array($w)){
                                   $w=implode(',',$w) ;
                                }
                                $value.=PHP_EOL.'#'.$q.'==>'.$w;
                            }
                        }
                    }
                }
                //添加堆栈信息
                $traces=debug_backtrace();
                $msg='';
                foreach($traces as $trace)
                {
                    if(isset($trace['file'],$trace['line']))
                    {
                        $msg.=PHP_EOL."#in ".$trace['file'].' ('.$trace['line'].')';
                    }
                }
                $value.=PHP_EOL.'堆栈信息:'.$msg.PHP_EOL;
                $value.="********************************************************".PHP_EOL;
                file_put_contents($filename,$value, FILE_APPEND|LOCK_EX);
            }
        }
        return $response;
    }

}
