<?php

namespace App\Providers;

use Event;
use App\Services\PluginManager;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use App\Events;

class PluginServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @param \App\Services\PluginManager $plugins
     *
     * @return void
     */
    public function boot(PluginManager $plugins)
    {
        // store paths of class files of plugins
        $src_paths = [];
        $loader = $this->app->make('translation.loader');
        // make view instead of view.finder since the finder is defined as not a singleton
        $finder = $this->app->make('view');
        foreach ($plugins->getPlugins() as $plugin) {
            if ($plugin->isEnabled()) {
                $src_paths[$plugin->getNameSpace()] = $plugin->getPath()."/src";
                // add paths of views
                $finder->addNamespace($plugin->getNameSpace(), $plugin->getPath()."/src/views");
                $loader->addNamespace($plugin->getNameSpace(), $plugin->getPath()."/lang");
            }
        }
        $this->registerPluginCallbackListener();
        $this->registerClassAutoloader($src_paths);
        $bootstrappers = $plugins->getEnabledBootstrappers();
        foreach ($bootstrappers as $file) {
           $bootstrapper = require $file;
            //执行文件的return返回的方法,闭包
           $this->app->call($bootstrapper);
        }
    }

    //注册插件监听事件
    protected function registerPluginCallbackListener()
    {
        Event::listen([
            Events\PluginWasEnabled::class,
            Events\PluginWasDeleted::class,
            Events\PluginWasDisabled::class,
        ], function ($event) {
            $event_class=get_class($event);
            //strstr(str1,str2) 函数用于判断字符串str2是否是str1的子串
            if(strstr($event_class, 'PluginWasEnabled')){
                if(file_exists($filename = $event->plugin->getPath()."/src/Listener/PluginWasEnabled.php")){
                    require $filename;
                }
            }elseif (strstr($event_class, 'PluginWasDeleted')){
                if(file_exists($filename = $event->plugin->getPath()."/src/Listener/PluginWasDeleted.php")){
                    require $filename;
                }
            }elseif (strstr($event_class, 'PluginWasDisabled')){
                if(file_exists($filename = $event->plugin->getPath()."/src/Listener/PluginWasDisabled.php")){
                    require $filename;
                }
            }
        });
    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('plugins', PluginManager::class);
    }

    //注册自动加载
    protected function registerClassAutoloader($paths)
    {
        spl_autoload_register(
            function ($class) use ($paths) {
            // traverse in registered plugin paths
            foreach ((array) array_keys($paths) as $namespace) {
                if ($namespace != '' && mb_strpos($class, $namespace) === 0) {
                    // parse real file path
                    $path = $paths[$namespace].Str::replaceFirst($namespace, '', $class).".php";
                    $path = str_replace('\\', '/', $path);
                    if (file_exists($path)) {
                        // include class file if it exists
                        include $path;
                    }
                }
            }
        });
    }

}
