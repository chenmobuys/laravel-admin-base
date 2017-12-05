<?php

namespace Chenmobuys\AdminBase\Extensions\Form;


use Encore\Admin\Form\Field;
use Encore\Admin\Facades\Admin;

class HasMany extends Field
{

    protected $view = 'chen::form.has-many';

    protected $hidden = [];

    protected $attrs = [];

    public function attrs($attributes = [])
    {
        $this->attrs = $attributes;
        return $this;
    }

    public function hidden($attributes = [])
    {
        $this->hidden = $attributes;
        return $this;
    }

    /**
     * Render file upload field.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function render()
    {
        $script = <<<EOT
        $('#table').on('click', '.table-field-remove', function(event) {
            $(event.target).closest('tr').css('display','none')
            var name = $(this).data('name')
            $('input[name="'+name+'"]').val(1)
        });

        $('#create').click(function (event) {
            $('#table tbody').append($('#config-tpl').html().replace(/__index__/g, $('#table tbody tr').length + 1));
        });
EOT;
        Admin::script($script);

        return parent::render()->with(['attrs'=>$this->attrs,'hidden'=>$this->hidden]);
    }

}
