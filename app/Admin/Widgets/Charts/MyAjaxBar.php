<?php

namespace App\Admin\Widgets\Charts;

use Illuminate\Http\Request;

class MyAjaxBar extends MyBar
{
    /**
     *
     * @param Request $request
     * @return mixed|void
     */
    public function handle(Request $request)
    {
        switch ((int) $request->get('option')) {
            case 30:
                $data = [
                    [
                        'data' => [44, 55, 41, 64, 22, 43, 21]
                    ],
                    [
                        'data' => [53, 32, 33, 52, 13, 44, 32]
                    ]
                ];
                $categories = [2001, 2002, 2003, 2004, 2005, 2006, 2007];

                break;
            case 28:
                $data = [
                    [
                        'data' => [44, 55, 41, 64, 22, 43, 21]
                    ],
                    [
                        'data' => [53, 32, 33, 52, 13, 44, 32]
                    ]
                ];
                $categories = [2001, 2002, 2003, 2004, 2005, 2006, 2007];

                break;
            case 7:
            default:
                $data = [
                    [
                        'data' => [44, 55, 41, 64, 22, 43, 21]
                    ],
                    [
                        'data' => [53, 32, 33, 52, 13, 44, 32]
                    ]
                ];
                $categories = [2001, 2002, 2003, 2004, 2005, 2006, 2007];
                break;
        }

        $this->withData($data);
        $this->withCategories($categories);
    }

    /**
     */
    protected function buildData()
    {
    }
}
