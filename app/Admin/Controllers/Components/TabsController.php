<?php
declare(strict_types=1);

namespace App\Admin\Controllers\Components;

use Faker\Factory;
use Dcat\Admin\DcatIcon;
use Dcat\Admin\Enums\StyleClassType;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Tab;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\TabButtonType;
use Dcat\Admin\Widgets\IconWithToolTip;
use Dcat\Admin\Widgets\StatItem;
use Dcat\Admin\Widgets\TabButton;
use Illuminate\Routing\Controller;

class TabsController extends Controller {
	public function index(Content $content) {
		return $content->header('Tabs')
			->row(function (Row $row) {
				$faker = Factory::create();
				$tabs1 = new Tab();
				$tabs1->title('Tab');
				$tabs1->add($faker->text(20), $faker->text(200), '1', TRUE);
				$tabs1->add($faker->text(20), $faker->text(200), '2');
				$tabs1->add($faker->text(20), $faker->text(200), '3');
				$row->column(6, $tabs1);
				$tabs2 = new Tab();
				$tabs2->title('Fill Tab');
				$tabs2->fill();
				$tabs2->add($faker->text(20), $faker->text(200), '1', TRUE, DcatIcon::HOME(), '4');
				$tabs2->add($faker->text(20), $faker->text(200), '2', FALSE, DcatIcon::USER());
				$tabs2->add($faker->text(20), $faker->text(200), '3', FALSE, DcatIcon::MESSAGE_SQUARE());
				$row->column(6, $tabs2);
			})
			->row(function (Row $row) {
				$faker = Factory::create();
				$tabs1 = new Tab(TabButtonType::PILL);
				$tabs1->title('Pill');
				$tabs1->add($faker->text(20), $faker->text(200), null, TRUE);
				$tabs1->add($faker->text(20), $faker->text(200), null, );
				$tabs1->add($faker->text(20), $faker->text(200), null);
				$row->column(6, $tabs1);
				$tabs2 = new Tab(TabButtonType::PILL);
				$tabs2->title('Pill Fill');
				$tabs2->fill();
				$tabs2->add($faker->text(20), $faker->text(200), null, TRUE, DcatIcon::HOME(), '3');
				$tabs2->add($faker->text(20), $faker->text(200), null, FALSE, DcatIcon::USER());
				$tabs2->add($faker->text(20), $faker->text(200), null, FALSE, DcatIcon::MESSAGE_SQUARE());
				$row->column(6, $tabs2);
			})
			->row(function (Row $row) {
				$faker = Factory::create();
				$tab = new Tab(TabButtonType::PILL);
                $tab->title('Tab as link');

                $activateTab = request('active_tab', 1);

                if ($activateTab == 1) {
                    $tab->add('tab1', $this->content(), null, true);
                    $tab->addLink('tab2', request()->fullUrlWithQuery(['active_tab' => 2]));
                } else {
                    $tab->addLink('tab1', request()->fullUrlWithQuery(['active_tab' => 1]));
                    $tab->add('tab2', "<div style='padding:15px'> <p>{$faker->text(300)}</p>  <p>{$faker->text(200)}</p></div>", null, true);
                }

				$row->column(6, $tab);
			})
			->row(function (Row $row) {
				$faker = Factory::create();
				$tab = new Tab(TabButtonType::PILL, function( TabButton $button) {
//                    return (new IconWithToolTip($button->icon, $button->badge))->class($button->active ? StyleClassType::PRIMARY : StyleClassType::SECONDARY);
                    // $badge = '<span class="badge rounded-pill badge-center h-px-40 w-px-40 bg-label-danger ms-1">'.$button->number.'</span>';
                    return (new StatItem((string)$button->number, $button->title, $button->badge))->render();
                });
                $tab->fill()->title('Custom Button');

                $activateTab = request('custom_tab', 1);

                if ($activateTab == 1) {
                    $tab->add('your are here', $this->content(), null, true, DcatIcon::HOME(), 'Phase 1');
                    $tab->addLink('tab2', request()->fullUrlWithQuery(['custom_tab' => 2]), false, DcatIcon::CALENDAR(), 'Phase 2');
                } else {
                    $tab->addLink('your are here', request()->fullUrlWithQuery(['custom_tab' => 1]), false, DcatIcon::HOME(), 'Phase 1');
                    $tab->add('tab2', "<div style='padding:15px'> <p>{$faker->text(300)}</p>  <p>{$faker->text(200)}</p></div>", null, true, DcatIcon::CALENDAR(), 'Phase 2');
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
