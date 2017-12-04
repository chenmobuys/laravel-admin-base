<?php

namespace Chenmobuys\AdminBase\Extensions\Form;


use Encore\Admin\Form\Field\Select;
use Encore\Admin\Facades\Admin;

class GoodsAttrItem extends Select
{

    protected $view = 'chen::form.goods-attr-items';

    /**
     * Render file upload field.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function render()
    {
        $name = 'attr_item_type_id';
        $script = <<<EOT
        $.get('/admin/goods/goods_attribute/attr_item',{type_id:"{$this->form->model()->$name}",goods_id:"{$this->form->model()->id}"},function(res){
            $('#item').html(res);
            $('.selects').select2();
        })
        
    $("select{$this->getElementClassSelector()}").change(function(){
        $.get('/admin/goods/goods_attribute/attr_item',{type_id:$(this).val(),goods_id:"{$this->form->model()->id}",mode:"new"},function(res){
            $('#item').html(res);
            $('.selects').select2();
        })
    })
EOT;
        Admin::script($script);

        return parent::render();
    }

}
