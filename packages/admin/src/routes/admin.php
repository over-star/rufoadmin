<?php


use Rufo\Ruquest\Support\MongoDBHelper;

Route::group(['as' => 'admin.'], function () {
    $namespacePrefix = '\\'.config('admin.controllers.namespace').'\\';
    Route::get('admin/login', ['uses' => $namespacePrefix.'AdminController@login','as' => 'login']);
    Route::get('admin/error', ['uses' => $namespacePrefix.'AdminController@error','as' => 'error']);
    Route::get('admin/logout', ['uses' => $namespacePrefix.'AdminController@logout','as' => 'logout']);
    Route::post('admin/login', ['uses' => $namespacePrefix.'AdminController@postLogin', 'as' => 'post-login']);
    //第三方登录糊掉笛子
    Route::get('auth/user/login/github', ['uses' => $namespacePrefix.'AdminController@githubLogin']);
    Route::get('auth/user/callback', ['uses' => $namespacePrefix.'AdminController@callback']);
    Route::get('plugins/{name}/{where}',['uses' => $namespacePrefix.'PluginsController@loadAsset']);
    Route::get('/mono',function (){

    });

   //后台权限路由
    Route::group(['middleware' => 'admin.user'], function () use ($namespacePrefix) {
        Route::get('/dashboard', ['uses' => $namespacePrefix.'AdminController@index',   'as' => 'dashboard']);
        //权限管理
        Route::get('admin/permission/index', ['uses' => $namespacePrefix.'UserController@permissionIndex']);
        Route::get('admin/permission/destroy/{id}', ['uses' => $namespacePrefix.'UserController@permissionDestroy']);
        Route::any('admin/permission/create', ['uses' => $namespacePrefix.'UserController@permissionCreate']);
        Route::any('admin/permission/edit/{id}', ['uses' => $namespacePrefix.'UserController@permissionEdit']);
        //角色管理
        Route::get('admin/role/index', ['uses' => $namespacePrefix.'UserController@roleIndex']);
        Route::get('admin/role/destroy/{id}', ['uses' => $namespacePrefix.'UserController@roleDestroy']);
        Route::any('admin/role/create', ['uses' => $namespacePrefix.'UserController@roleCreate']);
        Route::any('admin/role/edit/{id}', ['uses' => $namespacePrefix.'UserController@roleEdit']);
        //用户管理
        Route::get('admin/user/index', ['uses' => $namespacePrefix.'UserController@userIndex']);
        Route::get('admin/user/destroy/{id}', ['uses' => $namespacePrefix.'UserController@userDestroy']);
        Route::any('admin/user/create', ['uses' => $namespacePrefix.'UserController@userCreate']);
        Route::any('admin/user/edit/{id}', ['uses' => $namespacePrefix.'UserController@userEdit']);
        //用户管理
        Route::get('admin/menu/index', ['uses' => $namespacePrefix.'UserController@menuIndex']);
        Route::get('admin/menu/destroy/{id}', ['uses' => $namespacePrefix.'UserController@menuDestroy']);
        Route::any('admin/menu/create', ['uses' => $namespacePrefix.'UserController@menuCreate']);
        Route::any('admin/menu/edit/{id}', ['uses' => $namespacePrefix.'UserController@menuEdit']);
        //网站设置
        Route::any('system/setting/index', ['uses' => $namespacePrefix.'SystemController@setting']);
        Route::post('system/setting/update', ['uses' => $namespacePrefix.'SystemController@updateSetting']);
        Route::get('system/component/index', ['uses' => $namespacePrefix.'SystemController@component']);
        //插件设置
        Route::get('system/plugins/index', ['uses' => $namespacePrefix.'SystemController@plugins']);
        Route::get('system/plugins/enable/{name}', ['uses' => $namespacePrefix.'SystemController@pluginsEnable']);
        Route::get('system/plugins/disable/{name}', ['uses' => $namespacePrefix.'SystemController@pluginsDisable']);
        Route::get('system/plugins/uninstall/{name}', ['uses' => $namespacePrefix.'SystemController@pluginsUninstall']);
        //系统日志
        Route::get('log-viewer/request', ['uses' => $namespacePrefix.'LogController@request']);
        Route::get('log-viewer/request/detail/{name}', ['uses' => $namespacePrefix.'LogController@detail']);

    });

});
