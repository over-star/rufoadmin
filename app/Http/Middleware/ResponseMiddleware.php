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
        if($response->getStatusCode()!=200){
                //将请求写到log目录下
                $directory=storage_path().'/logs/https';
                if(!is_dir($directory)) mkdir($directory);
                //判断文件夹是否存在
                $date=date('Y-m-d',time());//日志名称
                $datetime=date('Y-m-d h:i:s',time());//日志内记录时间
                $filename=$directory.'/'.$date.'.log';
                $sizes=1024*10*1024;//日志文件大小,10*1024*1024
                if(file_exists($directory.'/'.$date.'.log'))
                    $filename = $this->checkFileExist($directory, $date, $sizes);
                $value = $this->recordUri($request, $datetime, $response);
                list($type, $value) = $this->recordResponse($response, $value);
                //记录请求
                $value = $this->recordRequest($request, $value, $type);
                //记录上传文件
                $value = $this->recordsFile($request, $value);
                //添加堆栈信息
                $value = $this->recordStack($value);
                //$value.="********************************************************".PHP_EOL;
                $value.=PHP_EOL;
                file_put_contents($filename,$value, FILE_APPEND|LOCK_EX);
            }
        return $response;
    }

    /**
     * 判断文件是否存在，不在就创建文件
     *
     * @param $directory
     * @param $date
     * @param $sizes
     * @return string
     */
    public function checkFileExist($directory, $date, $sizes)
    {
        $filename=$directory.'/'.$date.'.log';
        $file_size = filesize($directory . '/' . $date . '.log');
        if ($file_size > $sizes) {
            $is_ = file_exists($directory . '/who_is_log');
            if (!$is_) {
                //不存在就创建该文件
                file_put_contents($directory . '/who_is_log', '');
            }
            $str = file_get_contents($directory . '/who_is_log');
            //是否存在正在写的日志
            if ($str) {
                if (file_exists($directory . '/' . $str)) {
                    //判断该文件是否满
                    $file_size = filesize($directory . '/' . $str);
                    if ($file_size > $sizes) {
                        $gen_time = date('h:i:s', time());
                        file_put_contents($directory . '/who_is_log', $date . '-' . $gen_time . '.log');
                        $filename = $directory . '/' . $date . '-' . $gen_time . '.log';
                    } else {
                        $filename = $directory . '/' . $str;
                    }
                } else {
                    $gen_time = date('h:i:s', time());
                    $filename = $directory . '/' . $date . '-' . $gen_time . '.log';
                    file_put_contents($directory . '/who_is_log', $date . '-' . $gen_time . '.log');
                }
            } else {
                $gen_time = date('h:i:s', time());
                $filename = $directory . '/' . $date . '-' . $gen_time . '.log';
                file_put_contents($directory . '/who_is_log', $date . '-' . $gen_time . '.log');
            }
        }
        return $filename;
    }

    /**
     * @param $value
     * @return string
     */
    public function recordStack($value): string
    {
        $traces = debug_backtrace();
        $msg = '';
        foreach ($traces as $trace) {
            if (isset($trace['file'], $trace['line'])) {
                $msg .= PHP_EOL . "    in " . $trace['file'] . ' (' . $trace['line'] . ')';
            }
        }
        $value .= PHP_EOL . '堆栈信息:' . $msg . PHP_EOL;
        return $value;
    }

    /**
     * @param $request
     * @param $value
     * @return string
     */
    public function recordsFile($request, $value): string
    {
        foreach ($request->headers as $k => $v) {
            if ($k == 'content-type' && strstr($v[0], 'multipart/form-data;')) {
                if (count($_FILES)) {
                    $value .= PHP_EOL . '上传文件信息:';
                    foreach ($_FILES as $k1 => $v1) {
                        $value .= PHP_EOL . '##文件名:' . $k1;
                        foreach ($v1 as $q => $w) {
                            if (is_array($w)) {
                                $w = implode(',', $w);
                            }
                            $value .= PHP_EOL . '#' . $q . '==>' . $w;
                        }
                    }
                }
            }
        }
        return $value;
    }

    /**
     * @param $request
     * @param $value
     * @param $type
     * @return string
     */
    public function recordRequest($request, $value, $type): string
    {
        if (count($request->all())) {
            $value .= PHP_EOL.'Request参数信息:';
                $value .= PHP_EOL.$request->getContent();
        }
        $value .= PHP_EOL . 'Request Header信息:';
        $value .= PHP_EOL . '    Content-Type==>' . $type;
        foreach ($request->headers as $k => $v) {
            $value .= PHP_EOL . '    ' . $k . '==>' . $v[0];
        }
        return $value;
    }

    /**
     * @param $response
     * @param $value
     * @return array
     */
    public function recordResponse($response, $value): array
    {
        $type = $response->headers->get('Content-Type');
        if ($type == "text/html; charset=UTF-8" || is_null($type)) {
            $value .= PHP_EOL . 'Response信息:' . PHP_EOL . '    返回为html页面,请登录浏览器查看!';
        } else {
            $value .= PHP_EOL . 'Response信息:' . PHP_EOL . '    ' . $response->content();
        }
        return array($type, $value);
    }

    /**
     * @param $request
     * @param $datetime
     * @param $response
     * @return string
     */
    public function recordUri($request, $datetime, $response): string
    {
        $uri = $request->getUri();
        $value = '***[' . $datetime . ']' . '请求URI:' . $uri . '请求状态:' . $response->getStatusCode() . '/' . $request->method().'$$$';
        return $value;
    }

}
