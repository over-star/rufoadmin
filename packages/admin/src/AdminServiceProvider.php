<?php

namespace Rufo\Admin;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Rufo\Admin\Contracts\LogInterface;
use Rufo\Admin\Facades\AdminFacade;
use Rufo\Admin\Facades\LogsFacade;
use Rufo\Admin\Http\Middleware\RufoAdminMiddleware;
use Rufo\Admin\Strategies\MysqlStrategy;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register()
    {
        //注册slider_bar
        $this->app->register(ComposerServiceProvider::class);
        //注册门面
        $loader = AliasLoader::getInstance();
        $loader->alias('Admin', AdminFacade::class);
        $this->app->singleton('admin', function () {
            return new Admin();
        });
        //绑定日志记录
        $loader->alias('Logs', LogsFacade::class);
        $this->app->bind(LogInterface::class, MysqlStrategy::class);
        $this->app->singleton('logs', function () {
            return new Logs(App::make(LogInterface::class));
        });
        //加载配置文件
        $this->loadHelpers();
        $this->registerConfigs();
    }
    /**
     * Bootstrap the application services.
     *
     * @param \Illuminate\Routing\Router $router
     */
    public function boot(Router $router, Dispatcher $event)
    {
        $router->aliasMiddleware('admin.user', RufoAdminMiddleware::class);
        $this->loadViewsFrom(__DIR__.'/views', 'admin');
        $this->bulidEvent();
    }

    /**
     * Load helpers.
     */
    protected function loadHelpers()
    {
        foreach (glob(__DIR__.'/Helpers/*.php') as $filename) {
            require_once $filename;
        }
    }

    public function registerConfigs()
    {
        $this->mergeConfigFrom(
            dirname(__DIR__).'/publishable/config/admin.php', 'admin'
        );
    }

    private function bulidEvent()
    {

        Model::deleted (function($post){
            $user_id=Auth::user()->id;
            $message="用户删除了";
            $ip=Request::getClientIp();
            Logs::put($message, $user_id,$ip);
        });

    }

}
