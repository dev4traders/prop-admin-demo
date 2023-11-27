<?php

namespace App\Admin\Controllers\Dashboards;

use Dcat\Admin\Layout\Row;
use Dcat\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use App\Admin\Widgets\BalanceChartWidget;
use App\Admin\Widgets\ProfitTargetChartWidget;

class PropController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->header('Prop Dashboard')
            ->description('Account Statistics...')
            ->body(function (Row $row) {

                $widgetBalance = new BalanceChartWidget();
                $row->column(8, $widgetBalance);

                $widgetProfitTarget = new ProfitTargetChartWidget();
                $row->column(4, $widgetProfitTarget);
            });
    }
}
