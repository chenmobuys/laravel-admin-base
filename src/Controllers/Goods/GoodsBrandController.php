<?php

namespace Chenmobuys\AdminBase\Controllers\Goods;

use Chenmobuys\AdminBase\Models\GoodsBrand;
use Chenmobuys\AdminBase\Models\GoodsCategory;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class GoodsBrandController extends Controller
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

            $content->header(trans('chen.goods_brand'));
            $content->description(trans('admin.list'));

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

            $content->header(trans('chen.goods_brand'));
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

            $content->header(trans('chen.goods_brand'));
            $content->description(trans('admin.create'));

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
        return Admin::grid(GoodsBrand::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->column('brand_name', '品牌名称')->sortable();
            $grid->column('brand_desc', '品牌描述')->sortable();

            $grid->goods_categories('商品分类')->display(function ($goods_categories) {
                $goods_categories = array_map(function ($goods_categories) {
                    return "<span class='label label-success'>{$goods_categories['cat_name']}</span>";
                }, $goods_categories);
                return join('&nbsp;', $goods_categories);
            });

            //$grid->created_at('创建时间');
            //$grid->updated_at('更新时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(GoodsBrand::class, function (Form $form) {
            $form->display('id', '分类ID');

            $form->text('brand_name', '品牌名称');
            $form->multipleImage('brand_image', '品牌图片');
            $form->checkbox('goods_categories', '所属分类')->options(GoodsCategory::all()->pluck('cat_name', 'id'));


            $form->text('order', '品牌排序')->default(50);
        });
    }
}
