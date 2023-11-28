<?php

namespace App\Admin\Controllers\Dashboards;

use Faker\Factory;
use Dcat\Admin\DcatIcon;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Enums\RouteAuth;
use Dcat\Admin\Widgets\ImageAdv;
use App\Http\Controllers\Controller;
use Dcat\Admin\Widgets\IconWithToolTip;
use Dcat\Admin\Widgets\Cards\ProfitCard;
use Dcat\Admin\Widgets\Cards\PictureCard;

class AnalyticController extends Controller
{
    public function index(Content $content)
    {
        $faker = Factory::create();
        return $content
            ->header('Analytics Dashboard')
            ->description('Analytics Dashboard...')
            ->body(function (Row $row) use($faker) {
                $row->column(8, new PictureCard(
                    __('admin.title'),
                    __('admin.description'),
                    admin_route(RouteAuth::SETTINGS()),
                    new ImageAdv('/vendor/dcat-admin/img/illustrations/man-with-laptop-light.png', '/vendor/dcat-admin/img/illustrations/man-with-laptop-dark.png', 'man-with-laptop-light'))
                );
                $row->column(2, (new ProfitCard('Profit', '$2000', '78%', DcatIcon::HOME, new IconWithToolTip(DcatIcon::HELP, $faker->text(100)), admin_route(RouteAuth::SETTINGS())))->growing());
                $row->column(2, (new ProfitCard('Sales', '-$2000', '-78%', DcatIcon::HOME, new IconWithToolTip(DcatIcon::HELP, $faker->text(100)), admin_route(RouteAuth::SETTINGS())))->growing(false));
            });
    }
}
