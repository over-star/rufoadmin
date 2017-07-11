<?php
//初始化萎蔫
use App\Events\PluginWasEnabled;
use Illuminate\Contracts\Events\Dispatcher;

return function (Dispatcher $events) {
    require __DIR__ . '/src/'.'routes.php';
};
