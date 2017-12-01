<?php
use Illuminate\Routing\Router;

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => 'Chenmobuys\AdminBase\Controllers',
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    Route::resource('test/index', 'TestController');

});