<?php

namespace App\Admin\Controllers\Components;

use Dcat\Admin\Admin;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Card;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Widgets\Dropdown;
use App\Admin\Traits\PreviewCode;
use Dcat\Admin\Enums\ButtonClassType;
use Dcat\Admin\Widgets\DropdownItem;
use Illuminate\Routing\Controller;

class LoadingController extends Controller
{
    use PreviewCode;
    public function index(Content $content)
    {
        $content->row($this->buildPreviewButton().$this->newline());
        $content->row(function (Row $row) {

            $card = (new Card('Loading', function () {
                return <<<HTML
<div class="mb-1">
Enable loading effect: &nbsp;<code>$('#loadingtest').loading();</code>
</div>
<div class="mb-1">
     Destroy: &nbsp;<code>$('#loadingtest').loading(false);</code>
</div>

<hr>

<div  class="mb-1">
    Center full screen: &nbsp;<code>Dcat.loading();</code>
</div>
<div class="mb-1">
     Destroy: &nbsp;<code>Dcat.loading(false);</code>
</div>

<hr>

<div class="mb-1">
    Button loading effect:&nbsp;<code>$('.btn').buttonLoading();</code>
</div>
<div class="mb-1">
     Destroy: &nbsp;<code>$('.btn').buttonLoading(false);</code>
</div>
HTML;
            }))->id('loadingtest')
                ->tool('<a class="btn btn-light btn-sm shadow-0" onclick="Dcat.loading();setTimeout(function () { Dcat.loading(false); }, 2000)">Auto Center</a>');

            Admin::script(
                <<<JS
function loading_test(opt) {
    $('#loadingtest').loading(opt);

    setTimeout(function () {
        $('#loadingtest').loading(false);
    }, 2000);
}
loading_test();

$('.start_loading').click(function () {
    loading_test($(this).data());
});

$('.loading-1,.loading-2').click(function() {
    var _this = $(this);
    _this.buttonLoading();

    setTimeout(function() {
        _this.buttonLoading(false);
    }, 2500);
});

JS
            );

            $row->column(4, $card);

            $row->column(4, <<<HTML
<div class="mb-1">
    <span onclick="Dcat.NP.start()" class="btn btn-primary"> NProgress Start</span> &nbsp; <span onclick="Dcat.NP.done()" class="btn btn-success"> Done </span>
</div>

<br class="mb-2">

<div>
<span class="btn btn-primary loading-1"> 按钮loading效果1</span> &nbsp;&nbsp; <a href="#" class="loading-2" onclick="Dcat.NP.done()" > 按钮loading效果2 </a>
</div>
HTML
);
        });

        return $content->header('Loading');
    }

}
