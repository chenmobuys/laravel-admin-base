<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts',function(Blueprint $table){
            $table->increments('id');
            $table->integer('cat_id','文章分类')->default(0);
            $table->string('posts_title','文章标题');
            $table->string('posts_author')->comment('文章作者');
            $table->string('posts_from')->comment('文章来源');
            $table->string('posts_summary')->nullable()->comment('文章简介');
            $table->text('posts_content')->nullable()->comment('文章内容');
            $table->string('friend_link')->nullable()->comment('友情链接');
            $table->integer('click_count')->default(0)->comment('点击数');
            $table->tinyInteger('show_status')->default(1)->comment('显示状态[1]显示[2]隐藏');
            $table->tinyInteger('delete_status')->default(1)->comment('删除状态[1]未删除[2]已删除');
            $table->timestamps();
        });

        Schema::create('posts_categories',function(Blueprint $table){
            $table->increments('id');
            $table->integer('parent_id')->nullable()->default(0)->comment('父级ID');
            $table->string('cat_name',100)->comment('分类名称');
            $table->string('cat_image',255)->nullable()->comment('分类图片');
            $table->string('cat_desc',255)->nullable()->comment('分类介绍');
            $table->tinyInteger('is_show')->default(1)->comment('是否显示');
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
        Schema::dropIfExists('posts');
        Schema::dropIfExists('posts_categories');
    }
}
