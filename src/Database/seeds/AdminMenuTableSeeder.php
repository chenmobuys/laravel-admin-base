<?php

namespace Chenmobuys\AdminBase\Database\seeds;

use Illuminate\Database\Seeder;

class AdminMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Encore\Admin\Auth\Database\Menu::truncate();
        \Encore\Admin\Auth\Database\Menu::insert([
            //Auth Module
            [
                'parent_id' => 0,
                'order'     => 1,
                'title'     => '表盘',
                'icon'      => 'fa-dashboard',
                'uri'       => '/',
            ],
            [
                'parent_id' => 0,
                'order'     => 2,
                'title'     => '系统管理',
                'icon'      => 'fa-tasks',
                'uri'       => '',
            ],
            [
                'parent_id' => 2,
                'order'     => 3,
                'title'     => '管理员',
                'icon'      => 'fa-users',
                'uri'       => 'auth/users',
            ],
            [
                'parent_id' => 2,
                'order'     => 4,
                'title'     => '角色管理',
                'icon'      => 'fa-user',
                'uri'       => 'auth/roles',
            ],
            [
                'parent_id' => 2,
                'order'     => 5,
                'title'     => '权限管理',
                'icon'      => 'fa-ban',
                'uri'       => 'auth/permissions',
            ],
            [
                'parent_id' => 2,
                'order'     => 6,
                'title'     => '菜单管理',
                'icon'      => 'fa-bars',
                'uri'       => 'auth/menu',
            ],
            [
                'parent_id' => 2,
                'order'     => 7,
                'title'     => '日志管理',
                'icon'      => 'fa-history',
                'uri'       => 'auth/logs',
            ],
            //Helpers Module
            [
                'parent_id' => 0,
                'order'     => 8,
                'title'     => 'Helpers',
                'icon'      => 'fa-gears',
                'uri'       => '',
            ],
            [
                'parent_id' => 8,
                'order'     => 9,
                'title'     => 'Scaffold',
                'icon'      => 'fa-keyboard-o',
                'uri'       => 'helpers/scaffold',
            ],
            [
                'parent_id' => 8,
                'order'     => 10,
                'title'     => 'Database terminal',
                'icon'      => 'fa-database',
                'uri'       => 'helpers/terminal/database',
            ],
            [
                'parent_id' => 8,
                'order'     => 11,
                'title'     => 'Laravel artisan',
                'icon'      => 'fa-terminal',
                'uri'       => 'helpers/terminal/artisan',
            ],
            [
                'parent_id' => 8,
                'order'     => 12,
                'title'     => 'Routes',
                'icon'      => 'fa-list-alt',
                'uri'       => 'helpers/routes',
            ],
            [
                'parent_id' => 8,
                'order'     => 13,
                'title'     => 'Log viewer',
                'icon'      => 'fa-history',
                'uri'       => 'logs',
            ],
            [
                'parent_id' => 8,
                'order'     => 14,
                'title'     => 'Media manager',
                'icon'      => 'fa-file',
                'uri'       => 'media',
            ],

            //Goods Module
            [
                'parent_id' => 0,
                'order'     => 15,
                'title'     => '商品管理',
                'icon'      => 'fa-book',
                'uri'       => '',
            ],
            [
                'parent_id' => 15,
                'order'     => 16,
                'title'     => '商品列表',
                'icon'      => 'fa-bars',
                'uri'       => '/goods/goods',
            ],
            [
                'parent_id' => 15,
                'order'     => 17,
                'title'     => '商品分类',
                'icon'      => 'fa-sitemap',
                'uri'       => '/goods/goods_category',
            ],
            [
                'parent_id' => 15,
                'order'     => 18,
                'title'     => '商品品牌',
                'icon'      => 'fa-diamond',
                'uri'       => '/goods/goods_brand',
            ],
            [
                'parent_id' => 15,
                'order'     => 19,
                'title'     => '商品类型',
                'icon'      => 'fa-cubes',
                'uri'       => '/goods/goods_type',
            ],
            [
                'parent_id' => 15,
                'order'     => 20,
                'title'     => '商品属性',
                'icon'      => 'fa-cube',
                'uri'       => '/goods/goods_attribute',
            ],

            //Order Module
            [
                'parent_id' => 0,
                'order'     => 21,
                'title'     => '订单管理',
                'icon'      => 'fa-money',
                'uri'       => '',
            ],
            [
                'parent_id' => 21,
                'order'     => 22,
                'title'     => '订单列表',
                'icon'      => 'fa-bars',
                'uri'       => '/order/order',
            ],
            [
                'parent_id' => 21,
                'order'     => 23,
                'title'     => '发货列表',
                'icon'      => 'fa-bars',
                'uri'       => '/order/delivery',
            ],
            [
                'parent_id' => 21,
                'order'     => 24,
                'title'     => '退货列表',
                'icon'      => 'fa-bars',
                'uri'       => '/order/return',
            ],
            [
                'parent_id' => 21,
                'order'     => 25,
                'title'     => '订单日志',
                'icon'      => 'fa-history',
                'uri'       => '/order/log',
            ],

            //Promotion Module
            [
                'parent_id' => 0,
                'order'     => 26,
                'title'     => '促销管理',
                'icon'      => 'fa-bell',
                'uri'       => '',
            ],
            [
                'parent_id' => 26,
                'order'     => 27,
                'title'     => '活动列表',
                'icon'      => 'fa-bars',
                'uri'       => '/promotion/promotion',
            ],
            [
                'parent_id' => 26,
                'order'     => 28,
                'title'     => '优惠券',
                'icon'      => 'fa-send',
                'uri'       => '/promotion/coupon',
            ],


        ]);
    }
}
