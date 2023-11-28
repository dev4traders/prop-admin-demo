<?php

namespace App\Admin\Widgets\Charts;

use Dcat\Admin\Admin;
use Dcat\Admin\Widgets\ApexCharts\Chart;

class BarChart extends Chart
{
    public function __construct($containerSelector = null, $options = [])
    {
        parent::__construct($containerSelector, $options);

        $this->setUpOptions();
    }

    protected function setUpOptions()
    {
        $color = Admin::color();

        $colors = [$color->primary(), $color->primaryDarker()];

        $this->options([
            'colors' => $colors,
            'chart' => [
                'type' => 'bar',
                'height' => 430
            ],
            'plotOptions' => [
                'bar' => [
                    'horizontal' => false,
                    'dataLabels' => [
                        'position' => 'top',
                    ],
                ]
            ],
            'dataLabels' => [
                'enabled' => true,
                'offsetX' => -6,
                'style' => [
                    'fontSize' => '12px',
                    'colors' => ['#fff']
                ]
            ],
            'stroke' => [
                'show' => true,
                'width' => 1,
                'colors' => ['#fff']
            ],
            'xaxis' => [
                'categories' => [],
            ],
        ]);
    }

    /**
     * 处理图表数据
     */
    protected function buildData()
    {
        $data = [
            [
                'data' => [44, 55, 41, 64, 22, 43, 21]
            ],
            [
                'data' => [53, 32, 33, 52, 13, 44, 32]
            ]
        ];
        $categories = [2001, 2002, 2003, 2004, 2005, 2006, 2007];

        $this->withData($data);
        $this->withCategories($categories);
    }

    /**
     *
     * @param array $data
     *
     * @return $this
     */
    public function withData(array $data)
    {
        return $this->option('series', $data);
    }

    /**
     * 设置图表类别.
     *
     * @param array $data
     *
     * @return $this
     */
    public function withCategories(array $data)
    {
        return $this->option('xaxis.categories', $data);
    }

    /**
     *
     * @return string
     */
    public function render()
    {
        $this->buildData();

        return parent::render();
    }
}
