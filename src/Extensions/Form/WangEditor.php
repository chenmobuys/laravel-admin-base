<?php

namespace Chenmobuys\AdminBase\Extensions\Form;

use Encore\Admin\Facades\Admin;
use Encore\Admin\Form\Field;

class WangEditor extends Field
{
    protected $view = 'chen::form.wang-editor';

    protected static $css = [
        '/vendor/laravel-admin/wangEditor-3.0.11/release/wangEditor.min.css',
    ];

    protected static $js = [
        '/vendor/laravel-admin/wangEditor-3.0.11/release/wangEditor.min.js',
    ];

    public function render()
    {
        $name = $this->formatName($this->column);

        $this->script = <<<EOT
var E = window.wangEditor
var editor = new E('#{$this->id}');
//editor.customConfig.uploadImgShowBase64 = true
// 配置服务器端地址
editor.customConfig.uploadImgServer = '/admin/api/upload/image?dst=editor&_method=POST&_token='+LA.token
//editor.customConfig.uploadImgMaxLength = 10
//editor.customConfig.uploadImgMaxSize = 3 * 1024 * 1024

// 关闭粘贴样式的过滤
editor.customConfig.pasteFilterStyle = false
editor.customConfig.menus = [
    'head',  // 标题
    'bold',  // 粗体
    'italic',  // 斜体
    'underline',  // 下划线
    'strikeThrough',  // 删除线
    'foreColor',  // 文字颜色
    'backColor',  // 背景颜色
    'link',  // 插入链接
    'list',  // 列表
    'justify',  // 对齐方式
    'quote',  // 引用
    //'emoticon',  // 表情
    'image',  // 插入图片
    'table',  // 表格
    'video',  // 插入视频
    'code',  // 插入代码
    'undo',  // 撤销
    'redo'  // 重复
]    
    
editor.customConfig.onchange = function (html) {
    $('input[name=$name]').val(html);
}
editor.create()
EOT;
        Admin::js(self::$js);

        return parent::render();
    }
}