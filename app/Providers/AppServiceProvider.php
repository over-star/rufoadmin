<?php

namespace App\Providers;

use App\Facades\SettingFacade;
use App\Facades\TestFacade;
use App\Services\Setting;
use App\Services\Test;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //注册门面
        $loader = AliasLoader::getInstance();
        $loader->alias('Setting', SettingFacade::class);
        $this->app->singleton('setting', function () {
            return new Setting();
        });

    }
}
