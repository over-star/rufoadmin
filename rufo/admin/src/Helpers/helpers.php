<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('admin_asset')) {
    function admin_asset($path, $secure = null)
    {
        return asset(config('admin.assets_path').'/'.$path, $secure);
    }
}
if (!function_exists('url_pattern')) {
    function url_pattern($patterns, $activeClass = 'active', $inactiveClass = '')
    {
        $currentRequest = Route::getCurrentRequest();
        if (!$currentRequest) {
            return $inactiveClass;
        }

        $uri = urldecode($currentRequest->path());
        if (!is_array($patterns)) {
            $patterns = [$patterns];
        }
        foreach ($patterns as $p) {
            //函数判断指定的字符串与指定的格式是否符合。星号可作为通配符使用：$value = str_is('foo*', 'foobar');
            if (str_is($p, $uri)) {
                return $activeClass;
            }
        }
        return $inactiveClass;
    }
}

if (! function_exists('plugin_assets')) {
    function plugin_assets($name, $relative_uri)
    {
        $relative_uri=strtr($relative_uri,'/',"-");;
        return url("plugins/$name/$relative_uri");
    }
}

if (! function_exists('plugin_address')) {
    function plugin_address($name)
    {
        $base_path=base_path();
        $file_path = $base_path."/plugins/$name";
        return $file_path;
    }
}
