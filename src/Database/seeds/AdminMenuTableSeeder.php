<?php

namespace Chenmobuys\AdminBase\Database\seeds;

use Encore\Admin\Auth\Database\Permission;
use Illuminate\Database\Seeder;
use Encore\Admin\Auth\Database\Administrator;
use Encore\Admin\Auth\Database\Role;

class AdminMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create a user.
        Administrator::truncate();
        Administrator::create([
            'username'  => 'admin',
            'password'  => bcrypt('admin'),
            'name'      => 'Administrator',
        ]);

        // create a role.
        Role::truncate();
        Role::create([
            'name'  => 'Administrator',
            'slug'  => 'administrator',
        ]);

        // add role to user.
        Administrator::first()->roles()->save(Role::first());

        //create a permission
        Permission::truncate();
        Permission::insert([
            [
                'name'        => 'All permission',
                'slug'        => '*',
                'http_method' => '',
                'http_path'   => '*',
            ],
            [
                'name'        => 'Dashboard',
                'slug'        => 'dashboard',
                'http_method' => 'GET',
                'http_path'   => '/',
            ],
            [
                'name'        => 'Login',
                'slug'        => 'auth.login',
                'http_method' => '',
                'http_path'   => "/auth/login\r\n/auth/logout",
            ],
            [
                'name'        => 'User setting',
                'slug'        => 'auth.setting',
                'http_method' => 'GET,PUT',
                'http_path'   => '/auth/setting',
            ],
            [
                'name'        => 'Auth management',
                'slug'        => 'auth.management',
                'http_method' => '',
                'http_path'   => "/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs",
            ],
        ]);

        Role::first()->permissions()->save(Permission::first());

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
                'title'     => '帮助工具',
                'icon'      => 'fa-plug',
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
                'uri'       => 'goods/goods',
            ],
            [
                'parent_id' => 15,
                'order'     => 17,
                'title'     => '商品分类',
                'icon'      => 'fa-sitemap',
                'uri'       => 'goods/goods_category',
            ],
            [
                'parent_id' => 15,
                'order'     => 18,
                'title'     => '商品品牌',
                'icon'      => 'fa-diamond',
                'uri'       => 'goods/goods_brand',
            ],
            [
                'parent_id' => 15,
                'order'     => 19,
                'title'     => '商品类型',
                'icon'      => 'fa-cubes',
                'uri'       => 'goods/goods_type',
            ],
            [
                'parent_id' => 15,
                'order'     => 20,
                'title'     => '商品属性',
                'icon'      => 'fa-cube',
                'uri'       => 'goods/goods_attribute',
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
                'uri'       => 'order/order',
            ],
            [
                'parent_id' => 21,
                'order'     => 23,
                'title'     => '发货列表',
                'icon'      => 'fa-bars',
                'uri'       => 'order/order_delivery',
            ],
            [
                'parent_id' => 21,
                'order'     => 24,
                'title'     => '退货列表',
                'icon'      => 'fa-bars',
                'uri'       => 'order/order_return',
            ],
            [
                'parent_id' => 21,
                'order'     => 25,
                'title'     => '订单日志',
                'icon'      => 'fa-history',
                'uri'       => 'order/order_log',
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
                'uri'       => 'promo/promo',
            ],
            [
                'parent_id' => 26,
                'order'     => 28,
                'title'     => '优惠券',
                'icon'      => 'fa-send',
                'uri'       => 'promo/promo_coupon',
            ],

            //Ship Module
            [
                'parent_id' => 0,
                'order'     => 29,
                'title'     => '物流管理',
                'icon'      => 'fa-bars',
                'uri'       => '',
            ],
            [
                'parent_id' => 29,
                'order'     => 30,
                'title'     => '物流管理',
                'icon'      => 'fa-bars',
                'uri'       => 'ship/ship',
            ],
            [
                'parent_id' => 29,
                'order'     => 31,
                'title'     => '地区管理',
                'icon'      => 'fa-bars',
                'uri'       => 'ship/ship_area',
            ],

            //Posts Module
            [
                'parent_id' => 0,
                'order'     => 32,
                'title'     => '内容管理',
                'icon'      => 'fa-bars',
                'uri'       => '',
            ],
            [
                'parent_id' => 32,
                'order'     => 33,
                'title'     => '内容分类',
                'icon'      => 'fa-bars',
                'uri'       => 'posts/posts_category',
            ],
            [
                'parent_id' => 32,
                'order'     => 34,
                'title'     => '内容管理',
                'icon'      => 'fa-bars',
                'uri'       => 'posts/posts',
            ],


        ]);
    }
}
