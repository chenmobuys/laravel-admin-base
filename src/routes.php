<?php
use Illuminate\Routing\Router;

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => 'Chenmobuys\AdminBase\Controllers',
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('helpers/routes', 'Helper\RouteController@index');
    $router->resource('auth/logs', 'Auth\LogController', ['only' => ['index', 'destroy']]);

    $router->get('goods/goods_attribute/attr_item','Goods\GoodsAttributeController@getAttrItem');
    $router->get('goods/goods_attribute/attr_spec','Goods\GoodsAttributeController@getAttrSpec');
    $router->post('goods/goods_attribute/attr_spec_input','Goods\GoodsAttributeController@postAttrSpecInput');


    //Goods Module
    $router->resource('goods/goods', 'Goods\GoodsController');
    $router->resource('goods/goods_category', 'Goods\GoodsCategoryController');
    $router->resource('goods/goods_brand', 'Goods\GoodsBrandController');
    $router->resource('goods/goods_type', 'Goods\GoodsTypeController');
    $router->resource('goods/goods_attribute', 'Goods\GoodsAttributeController');

    //Order Module
    $router->resource('order/order','Order\OrderController');

});