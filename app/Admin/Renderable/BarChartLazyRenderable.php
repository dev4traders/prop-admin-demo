<?php

namespace App\Admin\Renderable;

use App\Admin\Widgets\Charts\Bar;
use App\Admin\Widgets\Charts\BarChart;
use Dcat\Admin\Support\LazyRenderable;

class BarChartLazyRenderable extends LazyRenderable
{
    public function render()
    {
        return new BarChart();
    }
}
