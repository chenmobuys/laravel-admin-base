<?php

namespace Chenmobuys\AdminBase\Database\seeds;

use Illuminate\Database\Seeder;
use Chenmobuys\AdminBase\Models\Order;
use Chenmobuys\AdminBase\Models\OrderGoods;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::truncate();
        $order = factory(Order::class)->times(50)->make();
        Order::insert($order->toArray());

        OrderGoods::truncate();
        $orderGoods = factory(OrderGoods::class)->times(200)->make();
        OrderGoods::insert($orderGoods->toArray());

    }
}
