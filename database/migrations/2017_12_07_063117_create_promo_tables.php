<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromoTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_activities',function(Blueprint $table){
            $table->increments('id');
            $table->timestamps();
        });

        Schema::create('promo_coupons',function(Blueprint $table){
            $table->increments('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promo_activities');
        Schema::dropIfExists('promo_promos');
    }
}
