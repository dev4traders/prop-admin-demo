<?php

namespace App\Admin\Controllers\Components;

use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Card;
use Dcat\Admin\Layout\Content;
use App\Admin\Widgets\Sessions;
use App\Admin\Traits\PreviewCode;
use App\Admin\Widgets\NewDevices;
use App\Admin\Widgets\TotalUsers;
use Illuminate\Routing\Controller;
use App\Admin\Widgets\ProductOrders;
use App\Admin\Widgets\TicketsWidget;
use App\Admin\Widgets\Charts\MyAjaxBar;
use App\Admin\Widgets\GoalOverviewWidget;
use App\Admin\Renderable\BarChartLazyRenderable;

class ChartController extends Controller
{
    use PreviewCode;

    public function index(Content $content)
    {
        return $content->header('Charts')
            ->description("Apexchart")
            ->body($this->buildPreviewButton().$this->newline())
            ->body($this->newline())
            ->body(function (Row $row) {
                $widgetTickets = new TicketsWidget();
                $row->column(4, $widgetTickets);

                $goalWidget = new GoalOverviewWidget();
                $row->column(4, $goalWidget);

            })
            ->body($this->newline())
            ->body(function (Row $row) {
                $bar = new BarChartLazyRenderable();
                $row->column(4, new Card('Bar', $bar->render()));

                $ajaxBar = new MyAjaxBar();

                $row->column(4, new Card('Ajax Bar', $ajaxBar));
            })
            ->body($this->newline())
            ->body(function (Row $row) {
                $donut = new NewDevices();
                $row->column(4, $donut);

                $round = new ProductOrders();
                $row->column(4, $round);
            })
            ->body($this->newline())
            ->body(function (Row $row) {
                $bar = new Sessions();
                $row->column(4, $bar);

                $card = new TotalUsers();
                $row->column(4, $card);
            });
    }

}
