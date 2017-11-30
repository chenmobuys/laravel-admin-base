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
                'title'     => 'Dashboard',
                'icon'      => 'fa-dashboard',
                'uri'       => '/',
            ],
            [
                'parent_id' => 0,
                'order'     => 2,
                'title'     => 'Admin',
                'icon'      => 'fa-tasks',
                'uri'       => '',
            ],
            [
                'parent_id' => 2,
                'order'     => 3,
                'title'     => 'Users',
                'icon'      => 'fa-users',
                'uri'       => 'auth/users',
            ],
            [
                'parent_id' => 2,
                'order'     => 4,
                'title'     => 'Roles',
                'icon'      => 'fa-user',
                'uri'       => 'auth/roles',
            ],
            [
                'parent_id' => 2,
                'order'     => 5,
                'title'     => 'Permission',
                'icon'      => 'fa-ban',
                'uri'       => 'auth/permissions',
            ],
            [
                'parent_id' => 2,
                'order'     => 6,
                'title'     => 'Menu',
                'icon'      => 'fa-bars',
                'uri'       => 'auth/menu',
            ],
            [
                'parent_id' => 2,
                'order'     => 7,
                'title'     => 'Operation log',
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
            //Extension Module
            [
                'parent_id' => 0,
                'order'     => 13,
                'title'     => 'Extensions',
                'icon'      => 'fa-plug',
                'uri'       => '',
            ],
            [
                'parent_id' => 13,
                'order'     => 14,
                'title'     => 'Log viewer',
                'icon'      => 'fa-history',
                'uri'       => 'logs',
            ],
            [
                'parent_id' => 13,
                'order'     => 15,
                'title'     => 'backup',
                'icon'      => 'fa-copy',
                'uri'       => 'backup',
            ],
            [
                'parent_id' => 13,
                'order'     => 16,
                'title'     => 'Config',
                'icon'      => 'fa-toggle-on',
                'uri'       => 'config',
            ],
            [
                'parent_id' => 13,
                'order'     => 17,
                'title'     => 'Api tester',
                'icon'      => 'fa-sliders',
                'uri'       => 'api-tester',
            ],
            [
                'parent_id' => 13,
                'order'     => 18,
                'title'     => 'Media manager',
                'icon'      => 'fa-file',
                'uri'       => 'media',
            ],
            [
                'parent_id' => 13,
                'order'     => 19,
                'title'     => 'Scheduling',
                'icon'      => 'fa-clock-o',
                'uri'       => 'scheduling',
            ],

            //China Module
            [
                'parent_id' => 0,
                'order'     => 20,
                'title'     => 'China area',
                'icon'      => 'fa-map',
                'uri'       => '',
            ],
            [
                'parent_id' => 20,
                'order'     => 21,
                'title'     => 'China',
                'icon'      => 'fa-bars',
                'uri'       => 'china/china',
            ],
            [
                'parent_id' => 20,
                'order'     => 22,
                'title'     => 'Province',
                'icon'      => 'fa-bars',
                'uri'       => 'china/china_province',
            ],
            [
                'parent_id' => 20,
                'order'     => 23,
                'title'     => 'City',
                'icon'      => 'fa-bars',
                'uri'       => 'china/china_city',
            ],
            [
                'parent_id' => 20,
                'order'     => 24,
                'title'     => 'District',
                'icon'      => 'fa-bars',
                'uri'       => 'china/china_district',
            ],
            [
                'parent_id' => 20,
                'order'     => 25,
                'title'     => 'Street',
                'icon'      => 'fa-bars',
                'uri'       => 'china/china_street',
            ],

            //Goods Module
            [
                'parent_id' => 0,
                'order'     => 26,
                'title'     => '商品管理',
                'icon'      => 'fa-book',
                'uri'       => '',
            ],
            [
                'parent_id' => 26,
                'order'     => 27,
                'title'     => '商品列表',
                'icon'      => 'fa-bars',
                'uri'       => '/goods/goods',
            ],
            [
                'parent_id' => 26,
                'order'     => 28,
                'title'     => '商品分类',
                'icon'      => 'fa-sitemap',
                'uri'       => '/goods/goods_category',
            ],
            [
                'parent_id' => 26,
                'order'     => 29,
                'title'     => '商品品牌',
                'icon'      => 'fa-diamond',
                'uri'       => '/goods/goods_brand',
            ],
            [
                'parent_id' => 26,
                'order'     => 30,
                'title'     => '商品类型',
                'icon'      => 'fa-cubes',
                'uri'       => '/goods/goods_type',
            ],
            [
                'parent_id' => 26,
                'order'     => 31,
                'title'     => '商品属性',
                'icon'      => 'fa-cube',
                'uri'       => '/goods/goods_attribute',
            ],

            //Order Module
            [
                'parent_id' => 0,
                'order'     => 32,
                'title'     => '订单管理',
                'icon'      => 'fa-money',
                'uri'       => '',
            ],
            [
                'parent_id' => 32,
                'order'     => 33,
                'title'     => '订单列表',
                'icon'      => 'fa-bars',
                'uri'       => '/order/order',
            ],
            [
                'parent_id' => 32,
                'order'     => 34,
                'title'     => '发货列表',
                'icon'      => 'fa-bars',
                'uri'       => '/order/delivery',
            ],
            [
                'parent_id' => 32,
                'order'     => 35,
                'title'     => '退货列表',
                'icon'      => 'fa-bars',
                'uri'       => '/order/return',
            ],
            [
                'parent_id' => 32,
                'order'     => 36,
                'title'     => '订单日志',
                'icon'      => 'fa-history',
                'uri'       => '/order/log',
            ],

            //Promotion Module
            [
                'parent_id' => 0,
                'order'     => 37,
                'title'     => '促销管理',
                'icon'      => 'fa-bell',
                'uri'       => '',
            ],
            [
                'parent_id' => 37,
                'order'     => 38,
                'title'     => '活动列表',
                'icon'      => 'fa-bars',
                'uri'       => '/promotion/promotion',
            ],
            [
                'parent_id' => 37,
                'order'     => 39,
                'title'     => '优惠券',
                'icon'      => 'fa-send',
                'uri'       => '/promotion/coupon',
            ],


        ]);
    }
}
