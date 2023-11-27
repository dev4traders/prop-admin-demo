<?php

namespace App\Admin\Widgets;

use Illuminate\Http\Request;
use Dcat\Admin\Widgets\Metrics\RadialBar;

class ProfitTargetChartWidget extends RadialBar
{

    public function init() {

        parent::init();

        $this->title('Profit target');
        $this->chartLabels('Profit target');

        //$this->height(400);
        $this->chartHeight(300);
    }

    public function handle(Request $request)
    {
        $this->withChart(83);
    }

    public function withChart(int $data)
    {
        return $this->chart([
            'series' => [$data],
        ]);
    }
}
