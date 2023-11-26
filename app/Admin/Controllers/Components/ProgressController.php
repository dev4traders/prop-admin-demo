<?php
declare(strict_types=1);

namespace App\Admin\Controllers\Components;

use Faker\Factory;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Card;
use Dcat\Admin\Widgets\Code;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Widgets\Progress;
use Illuminate\Routing\Controller;
use Dcat\Admin\Enums\StyleClassType;

class ProgressController extends Controller
{
    public function index(Content $content)
    {
        $faker = Factory::create();
        $types = StyleClassType::cases();

        return $content->header('Progress')
            ->row(function (Row $row) use ($faker, $types) {

                $progresses = collect($types)->map(function ($type) use($faker) {
                    $progress = new Progress($type, $faker->numberBetween(25, 75));

                    return $progress->render();
                })->join(' <br/>');
                $card1 = new Card('basic Progresses', $progresses);

                $progresses = collect($types)->map(function ($type) use($faker) {
                    $progress = new Progress($type, $faker->numberBetween(25, 75));

                    return $progress->stripped()->animated()->render();
                })->join(' <br/>');
                $card2 = new Card('Stripped Animated Progresses', $progresses);

                $row->column(6, $card1);
                $row->column(6, $card2);
            })
            ->row(function (Row $row) use ($faker, $types) {

                $progresses = collect($types)->map(function ($type) use($faker) {
                    $progress = new Progress($type, $faker->numberBetween(25, 75), 0, 100, null, '60px');

                    return $progress->render();
                })->join(' <br/>');
                $card1 = new Card('height Progresses', $progresses);

                $progresses = collect($types)->map(function ($type) use($faker) {
                    $progress = new Progress($type, $faker->numberBetween(25, 75), 0, 100, $faker->text(10));

                    return $progress->stripped()->animated()->render();
                })->join(' <br/>');
                $card2 = new Card('Text Progresses', $progresses);

                $row->column(6, $card1);
                $row->column(6, $card2);
            })
            ->row(new Card('Progress', new Code(__FILE__, 15, 44)));

    }
}
