<?php

namespace App\Admin\Controllers\Components;

use Illuminate\Support\Arr;
use Dcat\Admin\Widgets\Modal;
use Dcat\Admin\Widgets\Table;
use Dcat\Admin\Layout\Content;
use App\Admin\Traits\PreviewCode;
use Illuminate\Routing\Controller;
use App\Admin\Forms\UserProfileForm;
use App\Admin\Renderable\BarChartLazyRenderable;
use App\Admin\Renderable\UserTableLazyRenderable;

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
            ->body(new BarChartLazyRenderable())
            ->button('<button class="btn btn-white"><i class="feather icon-bar-chart-2"></i> Delay</button>');
    }

    protected function modal3()
    {
        return Modal::make()
            ->lg()
            ->title('User Profile')
            ->body(new UserProfileForm())
            ->button('<button class="btn btn-white btn-outline"><i class="feather icon-edit"></i> User Profile</button>');
    }

    protected function modal4()
    {
        return (new Modal())
            ->lg()
            ->title('User table')
            ->body(new UserTableLazyRenderable())
            ->button('<button class="btn btn-white "><i class="feather icon-grid"></i> User table</button>');
    }

    protected function render()
    {
        return <<<HTML
{$this->buildPreviewButton('btn-primary btn-outline')}
&nbsp;&nbsp;
<div class="btn-group">
{$this->modal2()}
{$this->modal3()}
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
