<?php

namespace App\Admin\Widgets;

use Dcat\Admin\Widgets\ApexCharts\Chart;

class BalanceChartWidget extends Chart
{

    public function __construct() {

        $generator = function ($len, $min = 10, $max = 300) {
            for ($i = 0; $i <= $len; $i++) {
                yield mt_rand($min, $max);
            }
        };

        $this->chart([
            'type'     => 'area',
            'height' => '300 px',
            'toolbar' => [
                'show' => false
            ]
        ])
        ->dataLabels([
            'enabled' => false
        ])
        ->xaxis([
            'title' => [
                'text' => 'Count',
            ],
            'type' => 'numeric'
        ])
        ->yaxis([
            'title' => [
                'text' => 'Balance',
            ]
        ])
        ->series([
            [
                'name' => 'Balance',
                'data' => collect($generator(30))->toArray()
            ],
        ]);
    }

}
