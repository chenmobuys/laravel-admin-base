<?php

namespace Chenmobuys\AdminBase\Controllers\Posts;

use Chenmobuys\AdminBase\Models\Posts;
use Chenmobuys\AdminBase\Models\PostsCategory;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class PostsController extends Controller
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

            $content->header(trans('chen.posts'));
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

            $content->header(trans('chen.posts'));
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

            $content->header(trans('chen.posts'));
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
        return Admin::grid(Posts::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('posts_title','文章标题');
            $grid->column('category.cat_name','文章分类');
            $grid->column('posts_author','文章作者');
            $grid->column('posts_from','文章来源');
            $grid->column('posts_summary','文章简介');

            $grid->created_at(trans('admin.created_at'));
            $grid->updated_at(trans('admin.updated_at'));

            $grid->filter(function(Grid\Filter $filter){
                $filter->equal('posts_title','文章标题');
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
        return Admin::form(Posts::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->select('cat_id','文章分类')->options(PostsCategory::selectOptions());
            $form->text('posts_title','文章标题');
            $form->text('posts_author','文章作者');
            $form->text('posts_from','文章来源');
            $form->text('friend_link','友情链接');
            $form->textarea('posts_summary','文章简介');
            $form->editor('posts_content','文章内容');

            $form->radio('show_status','显示状态')->options(config('const.show_status'))->default(1);

            $form->display('created_at', trans('admin.created_at'));
            $form->display('updated_at', trans('admin.updated_at'));
        });
    }
}
