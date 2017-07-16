<?php
use Illuminate\Support\Facades\Route;
$namespace='\\Behavior\\Controllers\\';
//请手动指定中间件
Route::get('/log-viewer/behavior', $namespace.'BehaviorController@logBehavior')->middleware('web');
