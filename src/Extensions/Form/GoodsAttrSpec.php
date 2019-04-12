<?php

namespace Chenmobuys\AdminBase\Extensions\Form;


use Encore\Admin\Form\Field\Select;
use Encore\Admin\Facades\Admin;

class GoodsAttrSpec extends Select
{

    protected $view = 'chen::form.goods-attr-spec';

    /**
     * Render file upload field.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function render()
    {
        $name = 'attr_spec_type_id';
        $script = <<<EOT
        $.get('/admin/goods/goods_attribute/attr_spec',{type_id:"{$this->form->model()->$name}",goods_id:"{$this->form->model()->id}"},function(res){
            $('#spec').html(res);
            ajaxGetSpecInputArr("{$this->form->model()->id}")
        })
        
    $("select{$this->getElementClassSelector()}").change(function(){
        $.get('/admin/goods/goods_attribute/attr_spec',{type_id:$(this).val(),goods_id:"{$this->form->model()->id}",mode:"new"},function(res){
            $('#spec').html(res);
            $('#spec_input_tab').html('');
        })
    })
EOT;
        Admin::script($script);
        Admin::js(asset('/vendor/chen/base/spec.js'));

        return parent::render();
    }

}
