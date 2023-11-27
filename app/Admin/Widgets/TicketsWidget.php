<?php

namespace App\Admin\Widgets;

use Dcat\Admin\Widgets\Metrics\RadialBar;
use Illuminate\Http\Request;

class TicketsWidget extends RadialBar
{
    public function init()
    {
        parent::init();

        $this->title('Tickets');
        $this->height(400);
        $this->chartHeight(300);
        $this->chartLabels('Completed Tickets');
        $this->dropdown([
            '7' => 'Last 7 Days',
            '28' => 'Last 28 Days',
            '30' => 'Last Month',
            '365' => 'Last Year',
        ]);
    }

    /**
     * 处理请求
     *
     * @param Request $request
     *
     * @return mixed|void
     */
    public function handle(Request $request)
    {
        switch ($request->get('option')) {
            case '365':
            case '30':
            case '28':
            case '7':
            default:
                $this->withChart(83);
        }
    }

    /**
     *
     * @param int $data
     *
     * @return $this
     */
    public function withChart(int $data)
    {
        return $this->chart([
            'series' => [$data],
        ]);
    }
}
