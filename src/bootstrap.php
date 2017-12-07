<?php

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */
use Encore\Admin\Form;

Form::extend('has_many',\Chenmobuys\AdminBase\Extensions\Form\HasMany::class);
Form::extend('editor', \Chenmobuys\AdminBase\Extensions\Form\WangEditor::class);



Form::extend('goods_attr_item',\Chenmobuys\AdminBase\Extensions\Form\GoodsAttrItem::class);
Form::extend('goods_attr_spec',\Chenmobuys\AdminBase\Extensions\Form\GoodsAttrSpec::class);