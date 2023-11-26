<?php

namespace App\Admin\Controllers\Grids;

use Dcat\Admin\Grid;
use Dcat\Admin\Layout\Content;
use App\Admin\Repositories\Image;
use App\Admin\Traits\PreviewCode;
//use App\Admin\Actions\Grid\SwitchGridViewAction;

class CustomGridController
{
    use PreviewCode;

    public function index(Content $content)
    {
        return $content
            ->title('Custom grid')
            ->description('Grid View')
            ->body($this->grid());
    }

    protected function grid()
    {
        return Grid::make(new Image(), function (Grid $grid) {
            if (request()->get('_view_') !== 'list') {

                $grid->view('admin.grid.custom');

                $grid->setActionClass(Grid\Displayers\Actions::class);
            }

            $grid->tools([
                $this->buildPreviewButton('btn-primary'),
               // new SwitchGridViewAction(),
            ]);

            $grid->disableCreateButton();

            $grid->column('id', __('ID'));

            $grid->column('name');
            $grid->column('url')->image();
            $grid->column('comment');
            $grid->column('created_at');
            $grid->column('updated_at');
        });
    }
}
