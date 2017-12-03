<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders',function (Blueprint $table){
            $table->increments('id');
            $table->string('out_trade_no',32)->comment('订单号');
            $table->string('order_type')->nullable()->comment('订单类型');

            $table->decimal('total_amount')->comment('总金额');
            $table->decimal('real_amount')->comment('实际金额');

            $table->string('receiver')->comment('收货人');
            $table->string('contact')->comment('联系方式');
            $table->integer('province')->default(0)->comment('省');
            $table->integer('city')->default(0)->comment('市');
            $table->integer('district')->default(0)->comment('县');
            $table->integer('street')->default(0)->comment('街道');
            $table->string('address')->nullable()->comment('收货地址');


            $table->tinyInteger('order_status')->default(0)->comment('订单状态');
            $table->tinyInteger('pay_status')->default(0)->comment('支付状态[0]待支付[1]已支付[2]退款中[3]已退款');
            $table->tinyInteger('ship_status')->default(0)->comment('发货状态[0]待发货[1]已发货[2]退货中[3]已退货');

            $table->timestamp('created_at')->nullable()->comment('创建时间');
            $table->timestamp('paid_at')->nullable()->comment('支付时间');
            $table->timestamp('shipped_at')->nullable()->comment('发货时间');

        });

        Schema::create('order_goods', function(Blueprint $table){
            $table->integer('order_id')->comment('订单ID');
            $table->integer('goods_id')->comment('商品ID');
            $table->string('goods_name')->comment('商品名称');
            $table->string('goods_number')->coment('商品货号');
            $table->integer('goods_count')->comment('商品数量');
            $table->decimal('market_price')->default(0)->comment('市场价');
            $table->decimal('real_price')->default(0)->comment('实际单价');
            $table->decimal('total_price')->default(0)->comment('总价');
            $table->timestamp('created_at')->nullable()->comment('创建时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_goods');

    }
}
