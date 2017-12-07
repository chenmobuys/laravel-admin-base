<?php

namespace Chenmobuys\AdminBase\Controllers\Ship;

use Chenmobuys\AdminBase\Models\Ship;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ShipController extends Controller
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

            $content->header(trans('chen.ship'));
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

            $content->header(trans('chen.ship'));
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

            $content->header(trans('chen.ship'));
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
        return Admin::grid(Ship::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->column('ship_name','物流名称');
            $grid->column('ship_slug','物流标识');
            $grid->column('show_status','显示状态')->display(function($value){
                return config('const.show_status.'.$value);
            });

            $grid->created_at(trans('admin.created_at'));
            $grid->updated_at(trans('admin.updated_at'));
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Ship::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->text('ship_name', '物流名称');
            $form->text('ship_slug', '快递标识');
            $form->image('ship_logo', '物流logo');
            $form->image('ship_image', '物流快递单');
            $form->radio('show_status', '显示状态')->options(config('const.show_status'))->default(1);

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
