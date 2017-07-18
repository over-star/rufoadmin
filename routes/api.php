<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->get('/', function () {
        return response()->json(['status'=>'sss']);
    });
    $api->post('/', function () {
        return response()->json(['status'=>'sss']);
    });
    $api->get('login', 'App\Http\Controllers\Api\UserController@login');
    $api->get('/protected', function () {
        return 'Let me tell you a secret';
    })->middleware('token','throttle');
});

