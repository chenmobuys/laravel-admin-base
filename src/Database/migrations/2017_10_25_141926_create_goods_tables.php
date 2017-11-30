<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table){
            $table->increments('id');
            $table->integer('cat_id')->default(0)->comment('分类ID');
            $table->integer('brand_id')->default(0)->comment('品牌ID');
            $table->string('goods_name',100)->comment('商品名称');
            $table->string('goods_image',255)->nullable()->comment('商品图片');
            $table->text('goods_album')->nullable()->comment('商品相册');
            $table->string('goods_number',100)->nullable()->comment('商品编号');
            $table->string('goods_keyword',100)->nullable()->comment('商品关键词');
            $table->string('goods_summary',255)->nullable()->comment('商品简介');
            $table->text('goods_desc')->nullable()->comment('商品描述');
            $table->integer('goods_weight')->default(0)->comment('商品重量（单位：克）');
            $table->decimal('market_price')->default(0)->comment('市场价');
            $table->decimal('shop_price')->default(0)->comment('本店价');
            $table->decimal('cost_price')->default(0)->comment('成本价');
            $table->integer('stock_count')->default(0)->comment('库存数');
            $table->integer('click_count')->default(0)->comment('点击数');
            $table->integer('collect_count')->default(0)->comment('收藏数');
            $table->integer('sale_count')->default(0)->comment('商品销量');
            $table->tinyInteger('is_free_shipping')->default(0)->comment('是否包邮');
            $table->tinyInteger('is_sale')->default(0)->comment('是否上架');
            $table->tinyInteger('is_new')->default(0)->comment('是否新品');
            $table->tinyInteger('is_hot')->default(0)->comment('是否热卖');
            $table->integer('order')->default(50)->comment('排序');
            $table->timestamps();
        });

        Schema::create('goods_categories', function(Blueprint $table){
            $table->increments('id');
            $table->integer('parent_id')->nullable()->default(0)->comment('父级ID');
            $table->string('cat_name',100)->comment('分类名称');
            $table->string('cat_image',255)->nullable()->comment('分类图片');
            $table->string('cat_desc',255)->nullable()->comment('分类介绍');
            $table->tinyInteger('is_show')->default(1)->comment('是否显示');
            $table->integer('order')->default(50)->comment('排序');
        });

        Schema::create('goods_brands', function(Blueprint $table){
            $table->increments('id');
            $table->string('brand_name',100)->comment('品牌名称');
            $table->text('brand_url')->nullable()->comment('品牌网址');
            $table->string('brand_logo',255)->nullable()->comment('品牌LOGO');
            $table->string('brand_desc',255)->nullable()->comment('品牌描述');
            $table->integer('order')->default(50)->comment('排序');
        });

        Schema::create('goods_brand_categories',function(Blueprint $table){
            $table->integer('brand_id');
            $table->integer('cat_id');
        });

        Schema::create('goods_types', function(Blueprint $table){
            $table->increments('id');
            $table->string('type_name',100)->comment('类型名称');
        });

        Schema::create('goods_attributes', function(Blueprint $table){
            $table->increments('id');
            $table->integer('type_id')->comment('类型ID');
            $table->string('attr_name',100)->comment('属性名称');
            $table->text('attr_values')->nullable()->comment('属性值');
            $table->tinyInteger('attr_type')->default(0)->comment('属性类型[0]重要属性[1]普通属性[2]次要属性');
            $table->tinyInteger('attr_input_type')->default(0)->comment('输入类型[0]文本框[1]选择框[2]文本域');
            $table->integer('order')->default(50)->comment('排序');
            $table->timestamps();
        });

        Schema::create('goods_attr_items',function(Blueprint $table){
            $table->increments('id');
            $table->integer('goods_id')->comment('商品ID');
            $table->integer('type_id')->comment('商品类型ID');
            $table->integer('attr_id')->comment('属性ID');
            $table->string('attr_name')->comment('属性名称');
            $table->string('attr_value')->comment('属性值');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods');
        Schema::dropIfExists('goods_categories');
        Schema::dropIfExists('goods_brands');
        Schema::dropIfExists('goods_brand_categories');
        Schema::dropIfExists('goods_types');
        Schema::dropIfExists('goods_attributes');
        Schema::dropIfExists('goods_attr_items');
    }
}
