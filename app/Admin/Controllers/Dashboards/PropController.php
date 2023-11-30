<?php

namespace App\Admin\Controllers\Dashboards;

use Dcat\Admin\Layout\Row;
use Dcat\Admin\Layout\Content;
use App\Admin\Traits\PreviewCode;
use App\Http\Controllers\Controller;
use App\Admin\Widgets\AccountDataCard;
use App\Admin\Widgets\TradeHistoryCard;
use App\Admin\Widgets\BalanceChartWidget;
use App\Admin\Widgets\TradingObjectiveCard;
use App\Admin\Widgets\ProfitTargetChartCard;

class PropController extends Controller
{
    use PreviewCode;

    public function index(Content $content)
    {
        return $content
            ->header('Prop Dashboard')
            ->description('Account Statistics...')
            ->body(function (Row $row) {

                $widgetBalance = new BalanceChartWidget();
                $row->column(9, $widgetBalance);

                $widgetProfitTarget = new ProfitTargetChartCard(3000, 5000);
                $row->column(3, $widgetProfitTarget);
            })
            ->body($this->newline())
            ->body(function (Row $row) {

                $to = new TradingObjectiveCard();
                $row->column(9, $to);

                $accountData = new AccountDataCard();
                $row->column(3, $accountData);
            })
            ->body($this->newline())
            ->body(function (Row $row) {

                $history = new TradeHistoryCard();
                $row->column(12, $history);
            });
    }
}
