<?php

namespace App\Admin\Controllers\Components;

use Faker\Factory;
use Dcat\Admin\DcatIcon;
use Dcat\Admin\Enums\ButtonSizeType;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Card;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Enums\RouteAuth;
use Dcat\Admin\Widgets\Dropdown;
use Dcat\Admin\Widgets\ImageAdv;
use Illuminate\Routing\Controller;
use Dcat\Admin\Widgets\IconWithToolTip;
use Dcat\Admin\Widgets\Cards\ProfitCard;
use Dcat\Admin\Widgets\Cards\PictureCard;
use Dcat\Admin\Widgets\DropdownItem;

class CardController extends Controller
{
    public function index(Content $content)
    {
        $faker = Factory::create();

        $content->row(new PictureCard(
            $faker->text(20),
            $faker->text(200),
            admin_route(RouteAuth::SETTINGS()),
            new ImageAdv('/vendor/dcat-admin/images/illustrations/man-with-laptop-light.png', '/vendor/dcat-admin/images/illustrations/man-with-laptop-dark.png', 'man-with-laptop-light'))
        );

        $content->row(function (Row $row) use ($faker) {
            $row->column(2, (new ProfitCard('Profit', '$2000', '78%', DcatIcon::HOME_CIRCLE, new IconWithToolTip(DcatIcon::HELP, $faker->text(100)), admin_route(RouteAuth::SETTINGS())))->growing());
            $row->column(2, (new ProfitCard('Loss', '-$2000', '-78%', DcatIcon::HOME_CIRCLE, new IconWithToolTip(DcatIcon::HELP, $faker->text(100)), admin_route(RouteAuth::SETTINGS())))->growing(false));
            $row->column(2, new ProfitCard('Dropdown', '$2000', '78%', DcatIcon::HOME_CIRCLE,
                (new Dropdown([(new DropdownItem('test'))]))->size(ButtonSizeType::SM)->icon(DcatIcon::HOME),
            admin_route(RouteAuth::SETTINGS()) ) );
        });

        $content->row(function (Row $row) use ($faker) {
            $row->column(4, (new Card($faker->text(20), $faker->text(200)) ) );
        });

        $header = 'Cards';
        $content->breadcrumb('Components');
        $content->breadcrumb($header);

        return $content->header($header);
    }
}
