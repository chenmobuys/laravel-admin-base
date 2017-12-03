<?php

namespace Chenmobuys\AdminBase\Extensions\Form;


use Encore\Admin\Form\Field\Select;
use Encore\Admin\Facades\Admin;

class GoodsAttrItems extends Select
{

    protected $view = 'chen::form.goods-attr-items';

    public $type = 'attr';

    /**
     * @param string $type
     */
    public function type($type = '')
    {
        $this->type = $type?:'attr';
    }

    /**
     * Render file upload field.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function render()
    {
        $name = $this->type == 'attr'?'attr_item_type_id':'attr_spec_type_id';
        $script = <<<EOT
        $.get('/admin/goods/goods_attribute/attribute',{goods_id:"{$this->form->model()->id}",type:"{$this->type}",type_id:"{$this->form->model()->$name}"},function(res){
            $('#attributes').html(res);
            $('.selects').select2();
        })
        
    $("select{$this->getElementClassSelector()}").change(function(){
        $.get('/admin/goods/goods_attribute/attribute',{type_id:$(this).val(),goods_id:"{$this->form->model()->id}",type:"{$this->type}",mode:"new"},function(res){
            $('#attributes').html(res);
            $('.selects').select2();
        })
    })
EOT;
        Admin::script($script);

        return parent::render()->with(['type'=>$this->type]);
    }

}
