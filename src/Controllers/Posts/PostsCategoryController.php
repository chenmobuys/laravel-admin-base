<?php

namespace Chenmobuys\AdminBase\Controllers\Posts;

use Chenmobuys\AdminBase\Models\GoodsCategory;
use Encore\Admin\Form;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Illuminate\Routing\Controller;
use Encore\Admin\Controllers\ModelForm;

class PostsCategoryController extends Controller
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

            $content->header(trans('chen.goods_category'));
            $content->description(trans('admin.list'));

            $content->body($this->tree());
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

            $content->header(trans('chen.goods_category'));
            $content->description(trans('admin.edit'));

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

            $content->header(trans('chen.goods_category'));
            $content->description(trans('admin.create'));

            $content->body($this->form());
        });
    }

    /**
     * @return \Encore\Admin\Tree
     */
    protected function tree()
    {
        return GoodsCategory::tree();
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(GoodsCategory::class, function (Form $form) {
            $form->display('id', '分类ID');

            $form->select('parent_id','父级分类')->options(GoodsCategory::selectOptions())->default(0);
            $form->text('cat_name','分类名称')->rules('required');
            $form->image('cat_image','分类图片')->uniqueName()->move('images/goods/category')->removable();
            $form->textarea('cat_desc','分类描述');

            $form->display('order','分类排序')->default(50);
        });
    }
}
