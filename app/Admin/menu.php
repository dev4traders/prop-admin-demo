<?php

return [
    // Dashboards
    [
        'id'        => 'dashboards',
        'title'     => __('prop.dashboards'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => '',
        'parent_id' => 0,
    ],
    [
        'id'        => 'analytic',
        'title'     => __('prop.analytics'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::DASHBOARD_ANALYTIC()),
        'parent_id' => 'dashboards',
    ],
    [
        'id'        => 'prop',
        'title'     => __('prop.prop'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::DASHBOARD_PROP()),
        'parent_id' => 'dashboards',
    ],

    // Components
    [
        'id'        => 'components',
        'title'     => __('prop.components'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => '',
        'parent_id' => 0,
    ],
    [
        'id'        => 'accordion',
        'title'     => __('prop.accordion'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::COMPONENTS_ACCORDION()),
        'parent_id' => 'components',
    ],
    [
        'id'        => 'alerts',
        'title'     => __('prop.alerts'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::COMPONENTS_ALERTS()),
        'parent_id' => 'components',
    ],
    [
        'id'        => 'check-and-radio',
        'title'     => __('prop.check_and_radio'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::COMPONENTS_CHECK_AND_RADIO()),
        'parent_id' => 'components',
    ],
    [
        'id'        => 'dropdown',
        'title'     => __('prop.dropdown'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::COMPONENTS_DROPDOWN()),
        'parent_id' => 'components',
    ],
    [
        'id'        => 'progress',
        'title'     => __('prop.progress'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::COMPONENTS_PROGRESS()),
        'parent_id' => 'components',
    ],
    [
        'id'        => 'tip-and-popover',
        'title'     => __('prop.tip_and_popover'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::COMPONENTS_TIP_AND_POPOVER()),
        'parent_id' => 'components',
    ],
    [
        'id'        => 'toastr',
        'title'     => __('prop.toastr'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::COMPONENTS_TOASTR()),
        'parent_id' => 'components',
    ],
    [
        'id'        => 'tabs',
        'title'     => __('prop.tabs'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::COMPONENTS_TABS()),
        'parent_id' => 'components',
    ],
    [
        'id'        => 'modal',
        'title'     => __('prop.modals'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::COMPONENTS_MODAL()),
        'parent_id' => 'components',
    ],
    [
        'id'        => 'cards',
        'title'     => __('prop.cards'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::COMPONENTS_CARDS()),
        'parent_id' => 'components',
    ],
    [
        'id'        => 'markdown',
        'title'     => __('prop.markdown'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::COMPONENTS_MARKDOWN()),
        'parent_id' => 'components',
    ],
    [
        'id'        => 'charts',
        'title'     => __('prop.charts'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::COMPONENTS_CHARTS()),
        'parent_id' => 'components',
    ],
    [
        'id'        => 'table',
        'title'     => __('prop.table'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::COMPONENTS_TABLE()),
        'parent_id' => 'components',
    ],
    [
        'id'        => 'loading',
        'title'     => __('prop.loading'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::COMPONENTS_LOADING()),
        'parent_id' => 'components',
    ],

    // Grids
    [
        'id'        => 'grids',
        'title'     => __('prop.grids'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => '',
        'parent_id' => 0,
    ],
    [
        'id'        => 'grid-custom',
        'title'     => __('prop.custom'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::GRIDS_CUSTOM()),
        'parent_id' => 'grids',
    ],
    [
        'id'        => 'grid',
        'title'     => __('prop.grid'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::GRIDS_GRID()),
        'parent_id' => 'grids',
    ],
    [
        'id'        => 'selector',
        'title'     => __('prop.selector'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::GRIDS_SELECTOR()),
        'parent_id' => 'grids',
    ],
    [
        'id'        => 'report',
        'title'     => __('prop.report'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::GRIDS_REPORT()),
        'parent_id' => 'grids',
    ],
    [
        'id'        => 'fixed-columns',
        'title'     => __('prop.fixed_columns'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::GRIDS_FIXED()),
        'parent_id' => 'grids',
    ],
    [
        'id'        => 'fixed-tree',
        'title'     => __('prop.tree'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::GRIDS_TREE()),
        'parent_id' => 'grids',
    ],
    // Grids -- Movie
    [
        'id'        => 'grids-movie',
        'title'     => __('prop.movie'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::GRIDS_MOVIE_COMING()),
        'parent_id' => 'grids',
    ],

    [
        'id'        => 'grids-movie-coming',
        'title'     => __('prop.movie'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::GRIDS_MOVIE_COMING()),
        'parent_id' => 'grids-movie',
    ],
    [
        'id'        => 'grids-movie-in-theatre',
        'title'     => __('prop.movie_in_theatre'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::GRIDS_MOVIE_IN_THEATRE()),
        'parent_id' => 'grids-movie',
    ],
    [
        'id'        => 'grids-movie-top',
        'title'     => __('prop.movie_top'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::GRIDS_MOVIE_TOP()),
        'parent_id' => 'grids-movie',
    ],
    // Basic
    [
        'id'        => 'basic',
        'title'     => __('prop.basic'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => '',
        'parent_id' => 0,
    ],
    [
        'id'        => 'basic-structure',
        'title'     => __('prop.basic_structure'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::BASIC()),
        'parent_id' => 'basic',
    ],
    [
        'id'        => 'basic-clients',
        'title'     => __('prop.clients'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::CLIENTS()),
        'parent_id' => 'basic',
    ],
    [
        'id'        => 'basic-layout',
        'title'     => __('prop.layout'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::LAYOUT()),
        'parent_id' => 'basic',
    ],
    // Forms
    [
        'id'        => 'forms',
        'title'     => __('prop.forms'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => '',
        'parent_id' => 0,
    ],
    // Forms - Basic Forms
    [
        'id'        => 'forms-when',
        'title'     => __('prop.when'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::FORMS_WHEN()),
        'parent_id' => 'forms',
    ],
    [
        'id'        => 'forms-step',
        'title'     => __('prop.step'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::FORMS_STEP()),
        'parent_id' => 'forms',
    ],
    [
        'id'        => 'forms-form',
        'title'     => __('prop.form'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::FORMS_FORM()),
        'parent_id' => 'forms',
    ],
    // Forms - Editors
    [
        'id'        => 'forms-editors',
        'title'     => __('prop.editors'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::FORMS_EDITORS_MARKDOWN()),
        'parent_id' => 'forms',
    ],
    [
        'id'        => 'forms-editor-markdown',
        'title'     => __('prop.markdown'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::FORMS_EDITORS_MARKDOWN()),
        'parent_id' => 'forms-editors',
    ],

    [
        'id'        => 'forms-editor-summercode',
        'title'     => __('prop.summercode'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::FORMS_EDITORS_SUMMERCODE()),
        'parent_id' => 'forms-editors',
    ],
    [
        'id'        => 'forms-editor-tinycme',
        'title'     => __('prop.tinymce'),
        'icon'      => Dcat\Admin\DcatIcon::HOME(),
        'uri'       => admin_route(App\Enums\RouteProp::FORMS_EDITORS_TINYMCE()),
        'parent_id' => 'forms-editors',
    ],

];
