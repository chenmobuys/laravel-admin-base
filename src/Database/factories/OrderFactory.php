<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(\Chenmobuys\AdminBase\Models\Order::class, function (Faker $faker) {
    return [
        'out_trade_no' => 123456,
        'order_type' => 0,
        'total_amount' => $faker->randomFloat(2,8,2),
        'real_amount' => $faker->randomFloat(2,8,2),
        'receiver' => $faker->lastName.' '.$faker->firstName,
        'contact' => $faker->phoneNumber,
        'address' => $faker->address,
        'order_status' => $faker->randomElement([0,1,2]),
        'created_at' => $faker->dateTimeBetween('-2 days','-1 days')
    ];
});

$factory->define(\Chenmobuys\AdminBase\Models\OrderGoods::class, function(Faker $faker){

    $goods = Db::table('goods')->orderByRaw('RAND()')->first();

    return [
        'order_id' => $faker->randomElement(\Chenmobuys\AdminBase\Models\Order::all()->pluck('id')->toArray()),
        'goods_id' => $goods->id,
        'goods_name' => $goods->goods_name,
        'goods_number' => $goods->goods_number,
        'goods_count' => $faker->randomNumber(),
        'market_price' => $faker->randomFloat(2,8,2),
        'real_price' => $faker->randomFloat(2,8,2),
        'total_price' => $faker->randomFloat(2,8,2),
        'created_at' => $faker->dateTimeBetween('-2 days','-1 days')
     ];
});
