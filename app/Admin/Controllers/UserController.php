<?php

namespace App\Admin\Controllers;

use Dcat\Admin\Grid;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Http\Repositories\Administrator;
use Dcat\Admin\Http\Controllers\AdminController;

class UserController extends AdminController
{
    public function index(Content $content)
    {
        return $content->full()->body($this->grid());
    }

    protected function grid()
    {
        return Grid::make(new Administrator(), function (Grid $grid) {
            $grid->column('id', 'ID')->sortable();
            $grid->column('username');
            $grid->column('name');
            $grid->column('created_at');

            $grid->rowSelector()->click();

            $grid->disableActions();
            $grid->disableBatchDelete();
            $grid->disableCreateButton();

            $grid->quickSearch(['id', 'username', 'name']);
        });
    }
}
