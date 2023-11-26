<?php

namespace App\Admin\Controllers\Components;

use Faker\Factory;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Card;
use Dcat\Admin\Widgets\Code;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Widgets\Accordion;
use Illuminate\Routing\Controller;

class AccordionController extends Controller
{
    public function index(Content $content)
    {
        return $content->header('Accordion')
            ->row(function (Row $row) {
                $faker = Factory::create();

                $accordion1 = Accordion::make();

                $accordion1->add($faker->name(), $faker->text(200), NULL, true);
                $accordion1->add($faker->name(), $faker->text(200));
                $accordion1->add($faker->name(), $faker->text(200));
                $accordion1->add($faker->name(), $faker->text(200));
                $accordion1->add($faker->name(), $faker->text(200));

                $row->column(5, new Card('Accordion', $accordion1));

                $accordion2 = Accordion::make();

                $accordion2->add($faker->name(), $faker->text(200));
                $accordion2->add($faker->name(), $faker->text(200));
                $accordion2->add($faker->name(), $faker->text(200));
                $accordion2->add($faker->name(), $faker->text(200));
                $accordion2->add($faker->name(), $faker->text(200));

                $row->column(5, $accordion2);
            });
            //->row(new Card('Accordion', new Code(__FILE__, 15, 44)));

    }
}
