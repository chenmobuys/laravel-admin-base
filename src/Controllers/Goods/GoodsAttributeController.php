<?php

namespace Chenmobuys\AdminBase\Controllers\Goods;

use Chenmobuys\AdminBase\Models\GoodsAttribute;
use Chenmobuys\AdminBase\Models\GoodsAttrItem;
use Chenmobuys\AdminBase\Models\GoodsAttrSpec;
use Chenmobuys\AdminBase\Models\GoodsAttrValue;
use Chenmobuys\AdminBase\Models\GoodsType;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
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

            $content->header(trans('chen.goods_attribute'));
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

            $content->header(trans('chen.goods_attribute'));
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

            $content->header(trans('chen.goods_attribute'));
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
        return Admin::grid(GoodsAttribute::class, function (Grid $grid) {
            $grid->model()->type(Request::get('attr_type'));

            $grid->id('ID')->sortable();

            $grid->column('attr_name', '属性名称');
            $grid->column('attr_type', '属性类型');
            $grid->column('goods_type.type_name', '商品类型');
            $grid->created_at('创建时间');
            $grid->updated_at('更新时间');
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
            $form->select('attr_type', '属性类型')->options(config('const.attr_type'));
            $form->select('attr_input_type', '输入类型')->options(config('const.attr_input_type'));
            $form->has_many('attr_values', '属性值')
                ->attrs(['attr_id', 'attr_value', 'id'])
                ->hidden(['id', 'attr_id']);

            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }

    public function getAttrItem()
    {
        $type_id = request('type_id');
        $goods_id = request('goods_id');
        $mode = request('mode');
        $attr_items = GoodsAttrItem::where('goods_id', $goods_id)->get()->toArray();
        $attributes = GoodsAttribute::with('attr_values')->where('type_id', $type_id)->whereIn('attr_type', [1, 3])->orderBy('attr_type', SORT_ASC)->get()->toArray();

        foreach ($attributes as $k => $v) {
            if ($mode != 'new') {
                if (isset($attr_items[$k]) && isset($attr_items[$k]['attr_value'])) {
                    $attributes[$k]['value'] = $attr_items ? $attr_items[$k]['attr_value'] : '';
                } else {
                    $attributes[$k]['value'] = '';
                }
            } else {
                $attributes[$k]['value'] = '';
            }

        }

        return view('chen::goods.goods_attribute.attr_item', compact('attributes', 'goods_id'));
    }

    public function getAttrSpec()
    {
        $type_id = request('type_id');
        $goods_id = request('goods_id');
        $mode = request('mode');
        $attr_spec = GoodsAttrSpec::where('goods_id',$goods_id)->get()->toArray();

        $keys = [];
        foreach($attr_spec as $k => $v){
            $keys = array_merge($keys,explode('_', $v['attr_ids']));
        }
        $keys = array_values(array_unique($keys));

        $attributes = GoodsAttribute::with('attr_values')->where('type_id', $type_id)->where('attr_type', 2)->orderBy('attr_type', SORT_ASC)->get()->toArray();


        return view('chen::goods.goods_attribute.attr_spec', compact('attributes', 'goods_id','keys'));
    }

    public function postAttrSpecInput()
    {
        $spec_arr = request('spec_arr');
        $goods_id = request('goods_id');

        if (!$spec_arr) return;
        $spec = [];
        if($goods_id){
            $spec1 = GoodsAttrSpec::where('goods_id',$goods_id)->get()->toArray();
            foreach ($spec1 as $k => $v)
                $spec[$v['attr_ids']] = $v;
        }

        //规格排序数组
        $spec_arr_sort = [];
        //规格排序完成后的数组
        $spec_arr_new = [];
        foreach ($spec_arr as $k => $v) {
            $spec_arr_sort[$k] = count($v);
        }
        asort($spec_arr_sort);
        foreach ($spec_arr_sort as $k => $v) {
            $spec_arr_new[$k] = $spec_arr[$k];
        }
        $attr_ids = array_keys($spec_arr_new);
        $attributes = GoodsAttribute::all()->pluck('attr_name', 'id')->toArray();
        $attr_values1 = GoodsAttrValue::all()->toArray();
        $attr_values = [];
        foreach ($attr_values1 as $k => $v) {
            $attr_values[$v['id']] = $v;
        }

        $spec_arr = combine_dika($spec_arr_new);

        return view('chen::goods.goods_attribute.attr_spec_input', compact('spec_arr', 'attr_ids', 'attributes', 'attr_values','goods_id','spec'));
    }
}
