<?php

namespace Rufo\Admin;

use Illuminate\Support\ServiceProvider;
use View;

class ComposerServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            'admin::dashboard.sidebar', 'Rufo\Admin\ViewComposers\MenuComposer'
        );
        view()->composer(
            'admin::dashboard.navbar', 'Rufo\Admin\ViewComposers\NavbarComposer'
        );
        view()->composer(
            'admin::dashboard.breadcrumbs', 'Rufo\Admin\ViewComposers\CrumbsComposer'
        );
        view()->composer(
            'admin::dashboard.page-header', 'Rufo\Admin\ViewComposers\CrumbsComposer'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }

}
