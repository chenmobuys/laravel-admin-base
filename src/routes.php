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
    $router->resource('order/order_delivery','Order\OrderDeliveryController');
    $router->resource('order/order_return','Order\OrderReturnController');
    $router->resource('order/order_log','Order\OrderLogController');

    //Ship Module
    $router->resource('ship/ship','Ship\ShipController');
    $router->resource('ship/ship_price','Ship\ShipPriceController');
    $router->resource('ship/ship_area','Ship\ShipAreaController');

    //Promotion Module
    $router->resource('promo/promo','Promo\PromoController');
    $router->resource('promo/promo_coupon','Promo\PromoCouponController');

    //Posts Module
    $router->resource('posts/posts','Posts\PostsController');
    $router->resource('posts/posts_category','Posts\PostsCategoryController');
});