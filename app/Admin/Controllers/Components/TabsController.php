<?php
declare(strict_types=1);

namespace App\Admin\Controllers\Components;

use Dcat\Admin\DcatIcon;
use Faker\Factory;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Code;
use Dcat\Admin\Layout\Content;
use Illuminate\Routing\Controller;
use Dcat\Admin\Widgets\Tab;

class TabsController extends Controller {
	public function index(Content $content) {
		return $content->header('Tabs')
			->row(function (Row $row) {
				$faker = Factory::create();
				$tabs1 = new Tab();
				$tabs1->title('Tab');
				$tabs1->add($faker->text(20), $faker->text(200), TRUE);
				$tabs1->add($faker->text(20), $faker->text(200));
				$tabs1->add($faker->text(20), $faker->text(200));
				$row->column(6, $tabs1);
				$tabs2 = new Tab();
				$tabs2->title('Fill Tab');
				$tabs2->fill();
				$tabs2->add($faker->text(20), $faker->text(200), TRUE, DcatIcon::HOME, 4);
				$tabs2->add($faker->text(20), $faker->text(200), FALSE, DcatIcon::USER);
				$tabs2->add($faker->text(20), $faker->text(200), FALSE, DcatIcon::MESSAGE_SQUARE);
				$row->column(6, $tabs2);
			})
			->row(function (Row $row) {
				$faker = Factory::create();
				$tabs1 = new Tab(Tab::TYPE_PILL);
				$tabs1->title('Pill');
				$tabs1->add($faker->text(20), $faker->text(200), TRUE);
				$tabs1->add($faker->text(20), $faker->text(200));
				$tabs1->add($faker->text(20), $faker->text(200));
				$row->column(6, $tabs1);
				$tabs2 = new Tab(Tab::TYPE_PILL);
				$tabs2->title('Pill Fill');
				$tabs2->fill();
				$tabs2->add($faker->text(20), $faker->text(200), TRUE, DcatIcon::HOME, 3);
				$tabs2->add($faker->text(20), $faker->text(200), FALSE, DcatIcon::USER);
				$tabs2->add($faker->text(20), $faker->text(200), FALSE, DcatIcon::MESSAGE_SQUARE);
				$row->column(6, $tabs2);
			})
			->row(new Code(__FILE__, 15, 44));
	}
}
