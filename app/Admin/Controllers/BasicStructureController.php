<?php

namespace App\Admin\Controllers;

use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Admin;
use Dcat\Admin\Models\Tag;
use Dcat\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Dcat\Admin\Http\Controllers\HasResourceActions;

class BasicStructureController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Tag')
            ->description('Tags')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed   $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed   $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('Edit Tag')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('Create tag')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(Tag::ownDomainOnly());

        $grid->column('id')->sortable();
        $grid->column('title')->sortable();
        $grid->column('enabled')->switch();

        $grid->column('created_at');
        $grid->column('updated_at');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed   $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Tag::ownDomainOnly()->findOrFail($id));

        $show->field('id');
        $show->field('title');
        $show->field('color');
        $show->field('created_at');
        $show->field('updated_at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Tag());
        $form->hidden('domain_id')->value(Admin::domain()->id);

        $form->display('id');
        $form->text('title');
//        $form->color('color');
        $form->switch('enabled');
        $form->display('created_at');
        $form->display('updated_at');

        return $form;
    }
}
