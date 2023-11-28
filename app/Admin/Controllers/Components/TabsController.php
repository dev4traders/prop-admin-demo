<?php
declare(strict_types=1);

namespace App\Admin\Controllers\Components;

use Faker\Factory;
use Dcat\Admin\DcatIcon;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Tab;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\TabButtonType;
use Illuminate\Routing\Controller;

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
				$tabs1 = new Tab(TabButtonType::PILL);
				$tabs1->title('Pill');
				$tabs1->add($faker->text(20), $faker->text(200), TRUE);
				$tabs1->add($faker->text(20), $faker->text(200));
				$tabs1->add($faker->text(20), $faker->text(200));
				$row->column(6, $tabs1);
				$tabs2 = new Tab(TabButtonType::PILL);
				$tabs2->title('Pill Fill');
				$tabs2->fill();
				$tabs2->add($faker->text(20), $faker->text(200), TRUE, DcatIcon::HOME, 3);
				$tabs2->add($faker->text(20), $faker->text(200), FALSE, DcatIcon::USER);
				$tabs2->add($faker->text(20), $faker->text(200), FALSE, DcatIcon::MESSAGE_SQUARE);
				$row->column(6, $tabs2);
			})
			->row(function (Row $row) {
				$faker = Factory::create();
				$tab = new Tab(TabButtonType::PILL);
                $tab->title('Tab as link');

                $activateTab = request('active_tab', 1);

                if ($activateTab == 1) {
                    $tab->add('tab1', $this->content(), true);
                    $tab->addLink('tab2', request()->fullUrlWithQuery(['active_tab' => 2]));
                } else {
                    $tab->addLink('tab1', request()->fullUrlWithQuery(['active_tab' => 1]));
                    $tab->add('tab2', "<div style='padding:15px'> <p>{$faker->text(300)}</p>  <p>{$faker->text(200)}</p></div>", true);
                }

				$row->column(6, $tab);
			});
//			->row(new Code(__FILE__, 14, 52));
	}

    private function content() : string {
        return "
        <p>
    <button class='btn btn-outline-primary '>btn-primary</button>&nbsp;&nbsp;
    <button class='btn btn-outline-info '>btn-info</button>&nbsp;&nbsp;
     <button class='btn btn-outline-success '>btn-success</button>&nbsp;&nbsp;
      <button class='btn btn-outline-warning  '>btn-warning</button>&nbsp;&nbsp;
    <button class='btn btn-outline-danger '>btn-danger</button>&nbsp;&nbsp;
     <button class='btn btn-outline-custom'> btn-custom </button>&nbsp;&nbsp;
</p>

";
    }

}
