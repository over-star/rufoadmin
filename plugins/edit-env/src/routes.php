<?php
use Illuminate\Support\Facades\Route;
$namespace='\\Env\\Controllers\\';
//请手动指定中间件
Route::get('/system/env/index', $namespace.'EnvController@index')->middleware('web');
Route::post('/system/env/update', $namespace.'EnvController@updateEnv')->middleware('web');
