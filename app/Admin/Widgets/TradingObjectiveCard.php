<?php

namespace App\Admin\Widgets;

use Dcat\Admin\DcatIcon;
use Illuminate\Http\Request;
use Dcat\Admin\Widgets\SimpleCard;
use Dcat\Admin\Enums\StyleClassType;
use Dcat\Admin\Widgets\StatProgress;
use Dcat\Admin\Widgets\IconWithToolTip;

class TradingObjectiveCard extends SimpleCard
{

    public function __construct()
    {
        $minDays = (new StatProgress(DcatIcon::HOME(true), 'Minimum trading Days', 2/5*100, '2/5', StyleClassType::INFO))->withCard()->render();
        $profit = (new StatProgress(DcatIcon::HOME(true), 'Profit Target', 1000/5000*100, '$100 / $5000', StyleClassType::DANGER))->withCard()->render();
        $dailyLoss = (new StatProgress(DcatIcon::HOME(true), 'Maximum daily Loss', 2000/5000*100, '$3450 / $5000', StyleClassType::WARNING))->withCard()->render();
        $loss = (new StatProgress(DcatIcon::HOME(true), 'Maximum Loss', 2000/5000*100, '$3450 / $5000', StyleClassType::SUCCESS))->withCard()->render();

        parent::__construct('Trading Objectives', $minDays.$profit.$dailyLoss.$loss);

        $this->tool(new IconWithToolTip(DcatIcon::HELP(), 'Profit Target'));
    }
}
