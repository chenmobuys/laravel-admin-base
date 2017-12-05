<?php

use Faker\Generator as Faker;

$list = [];

$factory->define(Chenmobuys\AdminBase\Models\GoodsCategory::class, function(Faker $faker) use ($list){
    return [
        'parent_id' => 0,
        'cat_name' => $faker->text(10),
        'cat_image' => NULL,
        'cat_desc' => $faker->text(50),
        'is_show' => $faker->randomElement([0,1]),
        'order' => 50,
    ] ;
});

$factory->define(Chenmobuys\AdminBase\Models\GoodsBrand::class, function(Faker $faker) use ($list){
    return [
        'brand_name' => $faker->text(10),
        'brand_url' => $faker->url,
        'brand_logo' => NULL,
        'brand_desc' => $faker->text(50),
        'order' => 50,
    ] ;
});

$factory->define(Chenmobuys\AdminBase\Models\GoodsBrandCategory::class, function(Faker $faker){
    return [
        'brand_id' => $faker->randomElement(\Chenmobuys\AdminBase\Models\GoodsBrand::all()->pluck('id')->toArray()),
        'cat_id' => $faker->randomElement(\Chenmobuys\AdminBase\Models\GoodsCategory::all()->pluck('id')->toArray()),
    ] ;
});

$factory->define(Chenmobuys\AdminBase\Models\Goods::class, function (Faker $faker) use ($list) {
    return [
        'cat_id' => $faker->randomElement(\Chenmobuys\AdminBase\Models\GoodsCategory::all()->pluck('id')->toArray()),
        'brand_id' => $faker->randomElement(\Chenmobuys\AdminBase\Models\GoodsBrand::all()->pluck('id')->toArray()),
        'goods_name' => $faker->text(50),
        'goods_image' => NULL,
        'goods_album' => NULL,
        'goods_number' => $faker->numerify('GOODS-###'),
        'goods_keyword' => $faker->text(20),
        'goods_summary' => $faker->text(100),
        'goods_desc' => $faker->text(200),
        'goods_weight' => $faker->numberBetween(10,100000),
        'market_price' => $faker->randomFloat(2,10,1000),
        'shop_price' => $faker->randomFloat(2,10,1000),
        'cost_price' => $faker->randomFloat(2,10,1000),
        'created_at' => $faker->dateTimeBetween('-2 days','-1 days'),
        'updated_at' => $faker->dateTimeBetween('-1 days','now'),
    ];
});

$factory->define(Chenmobuys\AdminBase\Models\GoodsType::class, function(Faker $faker){
    return [
        'type_name' => $faker->text(10),
    ] ;
});

$factory->define(Chenmobuys\AdminBase\Models\GoodsAttribute::class, function(Faker $faker){
    return [
        'type_id' => $faker->randomElement(\Chenmobuys\AdminBase\Models\GoodsType::all('id')->pluck('id')->toArray()),
        'attr_name' => $faker->text(10),
        'attr_type' => $faker->randomElement([1,2,3]),
        'attr_input_type' => $faker->randomElement([1,2,3]),
        'order' => 50,
        'created_at' => $faker->dateTimeBetween('-2 days','-1 days'),
        'updated_at' => $faker->dateTimeBetween('-1 days','now'),
    ] ;
});
