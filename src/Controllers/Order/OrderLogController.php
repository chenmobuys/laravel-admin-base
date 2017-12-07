<?php

namespace Chenmobuys\AdminBase\Controllers\Order;

use Chenmobuys\AdminBase\Models\OrderLog;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class OrderLogController extends Controller
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

            $content->header(trans('chen.order_log'));
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

            $content->header(trans('chen.order_log'));
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

            $content->header(trans('chen.order_log'));
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
        return Admin::grid(OrderLog::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->column('out_trade_no','订单号');
            $grid->column('receiver','收货人');
            $grid->column('contact','联系方式');
            $grid->column('address','详细地址');
            $grid->column('order_status','订单状态')->display(function($order_status){
                $status = ['待付款','待发货','待收货','待评价'];
                return $status[$order_status];
            });

            $grid->created_at(trans('admin.created_at'));
            $grid->updated_at(trans('admin.updated_at'));

            $grid->disableCreation();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(OrderLog::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->map('id','id','经纬度');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
