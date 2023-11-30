<?php

use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Admin;
use Dcat\Admin\DcatIcon;
use Dcat\Admin\Layout\Footer;
use Dcat\Admin\Layout\Navbar;
use Dcat\Admin\Layout\UserNav;
use Dcat\Admin\Enums\RouteAuth;
use Dcat\Admin\Layout\ColoredBadge;
use Illuminate\Support\Facades\App;
use Dcat\Admin\Enums\StyleClassType;
use Dcat\Admin\Widgets\Navs\LinkNav;
use Dcat\Admin\Layout\UserNavElement;
use Dcat\Admin\Widgets\Navs\ButtonNav;
use Illuminate\Support\Facades\Session;
use Dcat\Admin\Widgets\DarkModeSwitcher;
use Dcat\Admin\Widgets\Navs\ShortcutsNav;
use Dcat\Admin\Widgets\Navs\LangSelectorNav;
use Dcat\Admin\Widgets\Navs\DarkModeSwitcherNav;
use Dcat\Admin\Widgets\Navs\DashboardNotificationNav;

Form::resolving(function($form) {
    $form->disableEditingCheck();
    $form->disableViewCheck();
    $form->disableCreatingCheck();
});

Grid::resolving(function(Grid $grid) {
    $grid->setActionClass(Grid\Displayers\Actions::class);
    $grid->paginate(config('admin.paginate-default'));
});

Grid\Column::extend('code', function ($v) {
    return "<code>$v</code>";
});

config(admin_setting()->toArray());
$locale = Session::get('locale');

if(empty($locale))
    $locale = config('admin.locale');

if(!empty($locale) && !App::isLocale($locale)) {
    App::setLocale($locale);
}

Admin::menu()->add(include __DIR__.'/menu.php', false);

if (! Dcat\Admin\Support\Helper::isAjaxRequest()) {

    Admin::footer(function (Footer $footer) {
        $footer->start('<span class="text-center d-block d-md-inline-block mt-25">
        Powered by <a target="_blank" href="https://dev4traders.com">dev4traders</a>
    </span>');
        $footer->end('<p dir="auto"><code>prop-admin</code> is licensed under <a href="https://github.com/dev4traders/prop-admin/blob/main/LICENSE">The MIT License (MIT)</a>.</p>');
    });

    Admin::userNav(function (UserNav $userNav) {
        $userNav->put(new UserNavElement($userNav, admin_route(RouteAuth::DASH_SETTINGS()), DcatIcon::SETTINGS(), __('admin.dashboard_settings'), new ColoredBadge(5, StyleClassType::DANGER), true));
    });

    Admin::navbar(function (Navbar $navbar) {
        $navbar->putFree(new DarkModeSwitcher());
        $navbar->putFree(new LinkNav(__('admin.login'), admin_route(RouteAuth::SETTINGS())));
        $navbar->putFree(new ButtonNav(__('admin.login'), admin_route(RouteAuth::SETTINGS())));


        $navbar->putNav(new LangSelectorNav());
        $navbar->putNav(new ShortcutsNav( function (ShortcutsNav $shortcuts) {
            $shortcuts->add(DcatIcon::CALENDAR, __('admin.calendar'), __('admin.appointments'), admin_route(RouteAuth::SETTINGS()));
            $shortcuts->add(DcatIcon::CALENDAR, __('admin.calendar'), __('admin.appointments'), admin_route(RouteAuth::SETTINGS()));
            $shortcuts->add(DcatIcon::CALENDAR, __('admin.calendar'), __('admin.appointments'), admin_route(RouteAuth::SETTINGS()));
            $shortcuts->add(DcatIcon::CALENDAR, __('admin.calendar'), __('admin.appointments'), admin_route(RouteAuth::SETTINGS()));
            $shortcuts->add(DcatIcon::CALENDAR, __('admin.calendar'), __('admin.appointments'), admin_route(RouteAuth::SETTINGS()));
        }));
        $navbar->putNav(new DarkModeSwitcherNav());
        $navbar->putNav(new DashboardNotificationNav());
    });
}
