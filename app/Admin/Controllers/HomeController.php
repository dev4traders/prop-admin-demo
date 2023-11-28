<?php

namespace App\Admin\Controllers;

use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Tab;
use Dcat\Admin\Layout\Column;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Widgets\Button;
use Dcat\Admin\Enums\PlacementType;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->header('Dashboard')
            ->description('Description...')
            ->body(function (Row $row) {
                $row->column(6, function (Column $column) {
                    $column->row(function (Row $row) {
                    });
                });
            });
    }
}
