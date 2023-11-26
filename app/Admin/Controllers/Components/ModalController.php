<?php

namespace App\Admin\Controllers\Components;

use Dcat\Admin\Admin;
use Illuminate\Support\Arr;
use Dcat\Admin\Widgets\Modal;
use Dcat\Admin\Widgets\Table;
use Dcat\Admin\Layout\Content;
use App\Admin\Forms\UserProfile;
use App\Admin\Traits\PreviewCode;
use App\Admin\Renderable\BarChart;
use Illuminate\Routing\Controller;
use App\Admin\Renderable\ModalForm;
use App\Admin\Renderable\UserTable;

class ModalController extends Controller
{
    use PreviewCode;

    public function index(Content $content)
    {
        return $content
            ->header('Modal')
            ->description('Modals')
            ->body($this->render());
    }

    protected function modal1()
    {
        return (new Modal())
            ->lg()
            ->title('Table')
            ->body($this->table())
            ->button('<button class="btn btn-white"><i class="feather icon-grid"></i> Table</button>');
    }

    protected function modal2()
    {
        return (new Modal())
            ->lg()
            ->delay(300)
            ->title('Bar Chart delay')
            ->body(BarChart::make())
            ->button('<button class="btn btn-white"><i class="feather icon-bar-chart-2"></i> Delay</button>');
    }

    // protected function modal3()
    // {
    //     return Modal::make()
    //         ->lg()
    //         ->title('异步加载 - 表单')
    //         ->body(UserProfile::make())
    //         ->button('<button class="btn btn-white btn-outline"><i class="feather icon-edit"></i> 异步加载</button>');
    // }

    protected function modal4()
    {
        return (new Modal())
            ->lg()
            ->title('User table')
            ->body(UserTable::make())
            ->button('<button class="btn btn-white "><i class="feather icon-grid"></i> User table</button>');
    }

    protected function render()
    {
        return <<<HTML
{$this->buildPreviewButton('btn-primary btn-outline')}
&nbsp;&nbsp;
<div class="btn-group">
{$this->modal2()}
{$this->modal4()}
</div>
&nbsp;
{$this->modal1()}

HTML;
    }

    protected function table()
    {
        $data = [
            ['name' => 'PHP version',       'value' => 'PHP/'.PHP_VERSION],
            ['name' => 'Laravel version',   'value' => app()->version()],
            ['name' => 'CGI',               'value' => php_sapi_name()],
            ['name' => 'Uname',             'value' => php_uname()],
            ['name' => 'Server',            'value' => Arr::get($_SERVER, 'SERVER_SOFTWARE')],
            ['name' => 'Cache driver',      'value' => config('cache.default')],
            ['name' => 'Session driver',    'value' => config('session.driver')],
        ];

        return new Table(['name', 'value'], $data);
    }
}
