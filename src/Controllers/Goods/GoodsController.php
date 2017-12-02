<?php

namespace Chenmobuys\AdminBase\Controllers\Goods;

use Chenmobuys\AdminBase\Models\Goods;
use Chenmobuys\AdminBase\Models\GoodsBrand;
use Chenmobuys\AdminBase\Models\GoodsCategory;
use Chenmobuys\AdminBase\Models\GoodsType;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Illuminate\Routing\Controller;
use Encore\Admin\Controllers\ModelForm;



class GoodsController extends Controller
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

            $content->header('Goods');
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

            $content->header('Update');
            //$content->description('description');

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

            $content->header('Create');
            //$content->description('description');

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
        return Admin::grid(Goods::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->column('goods_name', '商品名称')->editable();
            $grid->column('goods_category.cat_name', '商品分类');

            $grid->created_at('创建时间')->sortable();
            $grid->updated_at('更新时间')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->like('goods_name', '商品名称');
            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Goods::class, function (Form $form) {

            $form->tab('商品信息', function (Form $form) {
                $form->select('cat_id', '商品分类')->options(GoodsCategory::selectOptions());
                $form->select('brand_id', '商品品牌')
                    ->options(GoodsBrand::all()->pluck('brand_name', 'id'))->default(0);
                $form->text('goods_name', '商品名称')->rules('required', ['required' => '商品名称不能为空']);
                $form->image('goods_image', '商品图片')
                    //->removable()->uniqueName()->move('images/goods/goods')
                    ->rules('required', ['required' => '商品图片不能为空']);
                $form->text('goods_number', '商品编号');
                $form->text('goods_weight', '商品重量')->default(0)->rules('integer', ['integer' => '必须为整数']);
                $form->decimal('market_price', '市场价')->default(0);
                $form->decimal('shop_price', '本店价')->default(0);
                $form->decimal('cost_price', '成本价')->default(0);
                $form->text('stock_count', '库存数')->default(0)->rules('integer');
                $form->select('is_free_shipping', '是否包邮')->options(['否', '是']);
                $form->select('is_sale', '是否上架')->options(['否', '是']);
                $form->select('is_new', '是否上新')->options(['否', '是']);
                $form->select('is_hot', '是否热卖')->options(['否', '是']);
                $form->text('goods_keyword', '关键词');
                $form->text('goods_summary', '商品简介');
                $form->editor('goods_desc', '商品详情');

            })->tab('商品相册', function (Form $form) {
                $form->multipleImage('goods_album', '商品图片')->move('images/goods/album')->uniqueName()->removable();
            })->tab('商品规格', function (Form $form) {

            })->tab('商品属性', function (Form $form) {
//                $form->select('goods_type','商品类型')->options(GoodsType::all()->pluck('type_name','id'))
//                    ->load('goods_attrs',env('API_DOMAIN').'/api/goods_attrs');

                //$form->selectOnChange('goods_attr_items')->options(GoodsType::all()->pluck('type_name','id'))
                   // ->loadOnChange('goods_attr_items',env('API_DOMAIN').':8080'.'/api/goods_attrs');
                //$form->multipleSelect('goods_attr_items')->options(GoodsType::all()->pluck('type_name','id'));
            });

        });
    }
}
