<?php

namespace App\Admin\Controllers\Components;

use Faker\Factory;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Card;
use Dcat\Admin\Widgets\Code;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Widgets\Button;
use Illuminate\Routing\Controller;
use Dcat\Admin\Enums\PlacementType;
use Dcat\Admin\Enums\StyleClassType;

class TipAndPopoverController extends Controller
{
    public function index(Content $content)
    {
        return $content->header('Popover')
            ->row(function (Row $row) {
                $faker = Factory::create();

                $btn1 = new Button('Right');
                $btn1->tooltip($faker->text(200), true, PlacementType::RIGHT);

                $row->column(6, new Card('Popover', $btn1));

                // $popover = new Popover();
                // $progress->class(StyleBgClassType::DANGER);

                $btn2 = new Button('Top');
                $btn2->tooltip($faker->text(200), false, PlacementType::TOP, StyleClassType::DANGER);

                $row->column(6, new Card('Tooltip', $btn2));
            })
            ->row(function (Row $row) {
                $faker = Factory::create();

                $btn1 = new Button('With Title');
                $btn1->tooltip($faker->text(200), true, PlacementType::RIGHT, StyleClassType::PRIMARY, $faker->text(20));

                $row->column(6, new Card('Popover with title', $btn1));
            })

            ->row(new Card('Code', new Code(__FILE__, 15, 44)));

    }
}
