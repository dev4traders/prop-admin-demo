<?php

use Dcat\Admin\Admin;
use App\Enums\RouteSneat;
use Dcat\Admin\Layout\Content;
use Illuminate\Routing\Router;
use Dcat\Admin\Enums\ButtonSizeType;
use Dcat\Admin\Enums\ButtonClassType;
use Illuminate\Support\Facades\Route;
use App\Admin\Controllers\UserController;
use App\Admin\Controllers\TableController;
use App\Admin\Controllers\LayoutController;
use App\Admin\Controllers\Forms\FormController;
use App\Admin\Controllers\Grids\GridController;
use App\Admin\Controllers\Forms\EditorController;
use App\Admin\Controllers\Grids\ReportController;
use App\Admin\Controllers\BasicStructureController;
use App\Admin\Controllers\Forms\FormWhenController;
use App\Admin\Controllers\Grids\GridTreeController;
use App\Admin\Controllers\Grids\SelectorController;
use App\Admin\Controllers\Components\CardController;
use App\Admin\Controllers\Components\TabsController;
use App\Admin\Controllers\Components\AlertController;
use App\Admin\Controllers\Components\ChartController;
use App\Admin\Controllers\Components\ModalController;
use App\Admin\Controllers\Grids\CustomGridController;
use App\Admin\Controllers\Components\ToastrController;
use App\Admin\Controllers\Components\LoadingController;
use App\Admin\Controllers\Grids\FixedColumnsController;
use App\Admin\Controllers\Components\MarkdownController;
use App\Admin\Controllers\Components\ProgressController;
use App\Admin\Controllers\Dashboards\AnalyticController;
use App\Admin\Controllers\Grids\Movies\Top250Controller;
use App\Admin\Controllers\Components\AccordionController;
use App\Admin\Controllers\Grids\Movies\InTheaterController;
use App\Admin\Controllers\Components\DropdownMenuController;
use App\Admin\Controllers\Grids\Movies\ComingSoonController;
use App\Admin\Controllers\Components\TipAndPopoverController;
use App\Admin\Controllers\Components\CheckboxAndRadioController;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
//    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->get('/test', function() {
        return ButtonClassType::PRIMARY(true);
    });

    $router->get('dashbord-analytic', function (Content $content) {
	    return (new AnalyticController())->index($content);
	})->name(RouteSneat::DASHBOARD_ANALYTIC());

    $router->get('components-accordion', function (Content $content) {
	    return (new AccordionController())->index($content);
	})->name(RouteSneat::COMPONENTS_ACCORDION());

    $router->get('components-alerts', function (Content $content) {
	    return (new AlertController())->index($content);
	})->name(RouteSneat::COMPONENTS_ALERTS());

    $router->get('components-check-and-radio', function (Content $content) {
	    return (new CheckboxAndRadioController())->index($content);
	})->name(RouteSneat::COMPONENTS_CHECK_AND_RADIO());

    $router->get('components-dropdown', function (Content $content) {
	    return (new DropdownMenuController())->index($content);
	})->name(RouteSneat::COMPONENTS_DROPDOWN());

    $router->get('components-progress', function (Content $content) {
	    return (new ProgressController())->index($content);
	})->name(RouteSneat::COMPONENTS_PROGRESS());

    $router->get('components-tip-amd-popover', function (Content $content) {
	    return (new TipAndPopoverController())->index($content);
	})->name(RouteSneat::COMPONENTS_TIP_AND_POPOVER());

    $router->get('components-toastr', function (Content $content) {
	    return (new ToastrController())->index($content);
	})->name(RouteSneat::COMPONENTS_TOASTR());

    $router->get('components-tabs', function (Content $content) {
	    return (new TabsController())->index($content);
	})->name(RouteSneat::COMPONENTS_TABS());

    $router->get('components-modal', function (Content $content) {
	    return (new ModalController())->index($content);
	})->name(RouteSneat::COMPONENTS_MODAL());

    $router->get('components-table', function (Content $content) {
	    return (new TableController())->index($content);
	})->name(RouteSneat::COMPONENTS_TABLE());

    $router->get('components-cards', function (Content $content) {
	    return (new CardController())->index($content);
	})->name(RouteSneat::COMPONENTS_CARDS());

    $router->get('components-markdown', function (Content $content) {
	    return (new MarkdownController())->index($content);
	})->name(RouteSneat::COMPONENTS_MARKDOWN());

    $router->get('components-charts', function (Content $content) {
	    return (new ChartController())->index($content);
	})->name(RouteSneat::COMPONENTS_CHARTS());

    $router->get('components-loading', function (Content $content) {
	    return (new LoadingController())->index($content);
	})->name(RouteSneat::COMPONENTS_LOADING());
    $router->get('components-loading/preview', 'Components\LoadingController@preview');

    $router->get('grids-custom', function (Content $content) {
	    return (new CustomGridController())->index($content);
	})->name(RouteSneat::GRIDS_CUSTOM());

    $router->get('grids-grid', function (Content $content) {
	    return (new GridController())->index($content);
	})->name(RouteSneat::GRIDS_GRID());

    $router->get('grids-selector', function (Content $content) {
	    return (new SelectorController())->index($content);
	})->name(RouteSneat::GRIDS_SELECTOR());

    $router->get('grids-report', function (Content $content) {
	    return (new ReportController())->index($content);
	})->name(RouteSneat::GRIDS_REPORT());
    $router->get('grids-report/preview', 'ReportController@preview');

    $router->get('grids-fixed', function (Content $content) {
	    return (new FixedColumnsController())->index($content);
	})->name(RouteSneat::GRIDS_FIXED());
    $router->get('grids-fixed/preview', 'Grids\FixedColumnsController@preview');

    $router->get('grids-tree', function (Content $content) {
	    return (new GridTreeController())->index($content);
	})->name(RouteSneat::GRIDS_TREE());
    $router->get('grids-tree/preview', 'Grids\GridTreeController@preview');

    $router->get('grids-movies-coming-soon', function (Content $content) {
	    return (new ComingSoonController())->index($content);
	})->name(RouteSneat::GRIDS_MOVIE_COMING());
    $router->get('grids-movies-coming-soon/preview', 'Grids\Movies\ComingSoonController@preview');

    $router->resource('grids-movies-in-theaters', InTheaterController::class, ['except' => ['create', 'show']])->name('index', RouteSneat::GRIDS_MOVIE_IN_THEATRE());
    $router->get('grids-movies-in-theaters/preview', 'Grids\Movies\InTheaterController@preview');

    $router->get('grids-movies/top250', function (Content $content) {
	    return (new Top250Controller())->index($content);
	})->name(RouteSneat::GRIDS_MOVIE_TOP());
    $router->get('grids-movies/top250/preview', 'Grids\Movies\Top250Controller@preview');

    $router->get('forms-editors-markdown', function (Content $content) {
	    return (new EditorController())->markdown($content);
	})->name(RouteSneat::FORMS_EDITORS_MARKDOWN());

    $router->get('forms-editors-summercode', function (Content $content) {
	    return (new EditorController())->summercode($content);
	})->name(RouteSneat::FORMS_EDITORS_SUMMERCODE());

    $router->get('forms-editors-tinymce', function (Content $content) {
	    return (new EditorController())->tinymce($content);
	})->name(RouteSneat::FORMS_EDITORS_TINYMCE());


    $router->get('forms-when', function (Content $content) {
	    return (new FormWhenController())->index($content);
	})->name(RouteSneat::FORMS_WHEN());

    $router->get('forms-step', function (Content $content) {
	    return (new FormWhenController())->index($content);
	})->name(RouteSneat::FORMS_STEP());
    $router->get('forms-step/preview', 'StepFormController@preview');
    $router->post('forms-step', 'StepFormController@store');

    $router->get('forms-form', function (Content $content) {
	    return (new FormController())->index($content);
	})->name(RouteSneat::FORMS_FORM());

    $router->resource('basic', BasicStructureController::class)->name('index', RouteSneat::BASIC());
    $router->resource('basic', BasicStructureController::class)->name('index', RouteSneat::BASIC());
    $router->get('layout', function (Content $content) {
	    return (new LayoutController())->index($content);
	})->name(RouteSneat::LAYOUT());

    $router->resource('clients', UserController::class)->name('index', RouteSneat::CLIENTS());

    // $router->resource('example', 'ExampleController');

    // $router->resource('clients', 'UserController');

    // // 布局示例
    // $router->get('layout', 'LayoutController@index');
    // // 报表示例
    // $router->get('reports', 'ReportController@index');
    // $router->get('reports/preview', 'ReportController@preview');
    // // 固定列功能示例
    // $router->get('fixed-columns', 'FixedController@index');
    // $router->get('fixed-columns/preview', 'FixedController@preview');
    // // 固定列功能示例
    // $router->get('with-border', 'BorderTableController@index');
    // $router->get('with-border/preview', 'BorderTableController@preview');
    // // 行间距
    // $router->get('row-space', 'RowSpaceController@index');
    // $router->get('row-space/preview', 'RowSpaceController@preview');
    // // 自定义表格视图
    // $router->get('grid/custom', 'CustomGridController@index');
    // $router->get('grid/custom/preview', 'CustomGridController@preview');

    // // simple page
    // $router->get('full', 'FullPageController@index');

    // $router->get('tree', 'GridTreeController@index');
    // $router->get('tree/preview', 'GridTreeController@preview');

    // // grid
    // $router->resource('components/grid', 'GridController', ['except' => ['create', 'show', 'destroy']]);
    // $router->get('components/grid/preview', 'GridController@preview');
    // // form
    // $router->get('form', 'FormController@index');
    // $router->post('form', 'FormController@index');
    // $router->get('form/preview', 'FormController@preview');

    // // 分步表单
    // $router->get('form/step/preview', 'StepFormController@preview');
    // $router->get('form/step', 'StepFormController@index');
    // $router->post('form/step', 'StepFormController@store');

    // // 动态显示表单
    // $router->get('form/when/preview', 'FormWhenController@preview');
    // $router->get('form/when', 'FormWhenController@index');
    // $router->post('form/when', 'FormWhenController@store');

    // // 表单弹窗
    // $router->get('form/modal', 'ModalFormController@index');
    // $router->get('form/modal/preview', 'ModalFormController@preview');

    // $router->get('form/tinymce', 'EditorController@tinymce');
    // $router->get('form/tinymce/preview', 'EditorController@preview');
    // $router->get('form/markdown', 'EditorController@markdown');
    // $router->get('form/summercode', 'EditorController@summercode');

    // // 表格
    // $router->get('tables/selector', 'SelectorController@index');
    // $router->get('tables/selector/preview', 'SelectorController@preview');


    // $router->get('components/accordion', 'Components\AccordionController@index');
    // $router->get('components/charts', 'Components\ChartController@index');
    // $router->get('components/charts/preview', 'Components\ChartController@preview');
    // $router->get('components/card-box', 'Components\BoxController@index');
    // $router->get('components/alert', 'Components\AlertController@index');
    // $router->get('components/tab-button', 'Components\TabController@index');
    // $router->get('components/markdown', 'Components\MarkdownController@index');
    // $router->get('components/layer', 'Components\LayerController@index');
    // $router->get('components/checkbox-radio', 'Components\CheckboxController@index');
    // $router->get('components/checkbox-radio/preview', 'Components\CheckboxController@preview');
    // $router->get('components/tooltip', 'Components\TooltipController@index');
    // $router->get('components/dropdown-menu', 'Components\DropdownMenuController@index');
    // $router->get('components/loading', 'Components\LoadingController@index');
    // $router->get('components/loading/preview', 'Components\LoadingController@preview');
    // $router->get('components/metric-cards', 'Components\MetricCardController@index');
    // $router->get('components/metric-cards/preview', 'Components\MetricCardController@preview');

    // $router->get('components/modal', 'Components\ModalController@index');
    // $router->get('components/modal/preview', 'Components\ModalController@preview');

    // // movies
    // $router->get('movies/coming-soon', 'Movies\ComingSoonController@index');
    // $router->get('movies/coming-soon/preview', 'Movies\ComingSoonController@preview');
    // $router->resource('movies/in-theaters', 'Movies\InTheaterController', ['except' => ['create', 'show']]);
    // $router->get('movies/in-theaters/preview', 'Movies\InTheaterController@preview');
    // $router->get('movies/top250', 'Movies\Top250Controller@index');
    // $router->get('movies/top250/preview', 'Movies\Top250Controller@preview');

    // $router->get('/extensions/ueditor', 'Extensions\UeditorController@index');
    // $router->get('/extensions/ueditor/preview', 'Extensions\UeditorController@preview');

});
