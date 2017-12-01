<?php

namespace Chenmobuys\AdminBase\Controllers\Goods;

use Chenmobuys\AdminBase\Models\GoodsAttribute;
use Chenmobuys\AdminBase\Models\GoodsType;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
//use App\Admin\Extensions\Tools\ButtonGroupFilter;
use Illuminate\Support\Facades\Request;

class GoodsAttributeController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('商品属性');
            //$content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(GoodsAttribute::class, function (Grid $grid) {
            $grid->model()->type(Request::get('attr_type'));

            $grid->id('ID')->sortable();

            $grid->column('attr_name', '属性名称');
            $grid->column('attr_type', '属性类型')->display(function ($attr_type) {
                $type = ['关键属性', '销售属性', '次要属性'];
                return $type[$attr_type];
            });
            $grid->column('goods_type.type_name', '商品类型');
            $grid->created_at('创建时间');
            $grid->updated_at('更新时间');

//            $grid->tools(function ($tools) {
//                $tools->append(new ButtonGroupFilter('attr_type', ['关键属性', '销售属性', '次要属性']));
//            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(GoodsAttribute::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->select('type_id', '商品类型')->options(GoodsType::all()->pluck('type_name', 'id'));
            $form->text('attr_name', '属性名称');
            $form->select('attr_type', '属性类型')->options(['关键属性', '销售属性', '次要属性']);
            $form->select('attr_input_type', '输入类型')->options(['文本框', '选择框', '文本域']);
            $form->textarea('attr_values', '属性值');

            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }
}
