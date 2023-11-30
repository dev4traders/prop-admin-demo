<?php

namespace App\Admin\Widgets;

use Dcat\Admin\DcatIcon;
use Dcat\Admin\Widgets\SimpleCard;
use Dcat\Admin\Widgets\IconWithToolTip;
use Dcat\Admin\Widgets\ApexCharts\RadialBarChart;

class ProfitTargetChartCard extends SimpleCard
{

    public function __construct(float $valueCurrent, float $valueTarget)
    {
        $value = $valueCurrent/$valueTarget*100;

        $radialBar = new RadialBarChart();
        $radialBar->value($value);
        $radialBar->hollowSize(30);
        $radialBar->height(200);
        $radialBar->padding([
            'top' => -40,
            'bottom' => -45,
            'left' => -20,
            'right' => -20
        ]);

        parent::__construct('Profit Target', $radialBar);

        $this->tool(new IconWithToolTip(DcatIcon::HELP(), 'Profit Target'));
        $this->footer('<span class="font-weight-bold">$'.$valueCurrent.'</span>/<span class="text-muted">$'.$valueTarget.'</span>');
    }
}
