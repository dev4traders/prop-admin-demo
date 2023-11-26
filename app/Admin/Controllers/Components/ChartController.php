<?php

namespace App\Admin\Controllers\Components;

use Dcat\Admin\Layout\Row;
use Dcat\Admin\Layout\Content;
use App\Admin\Traits\PreviewCode;
use Illuminate\Routing\Controller;

class ChartController extends Controller
{
    use PreviewCode;

    public function index(Content $content)
    {
        return $content->header('Charts')
            ->description("Apexchart")
            ->body($this->buildPreviewButton().$this->newline())
            ->body(function (Row $row) {
            })
            ->body($this->newline())
            ->body(function (Row $row) {
            })
            ->body($this->newline())
            ->body(function (Row $row) {

            });
    }

}
