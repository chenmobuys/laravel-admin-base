<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas',function(Blueprint $table){
            $table->increments('id');
            $table->string('name')->comment('名称');
            $table->integer('level')->default(1)->comment('地区等级[1]省[2]市[3]县[4]街道');
            $table->integer('parent_id')->comment('父级ID');
            $table->integer('order')->default(50)->comment('排序');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('areas');
    }
}
