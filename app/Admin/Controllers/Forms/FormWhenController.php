<?php

namespace App\Admin\Controllers\Forms;

use Dcat\Admin\Widgets\Form;
use Dcat\Admin\Layout\Content;
use App\Admin\Traits\PreviewCode;

class FormWhenController
{
    use PreviewCode;

    protected $options = [
        1 => 'Show text box',
        2 => 'Show editor',
        3 => 'Show file upload',
        4 => 'Still display the text box',
    ];

    public function index(Content $content)
    {
        return $content->title('Form dynamic display')
            ->body($this->buildPreviewButton())
            ->body($this->newline())
            ->body(
                <<<HTML
<div class="card">{$this->form()->render()}</div>
HTML
            );
    }

    protected function form()
    {
        $form = new Form();

        $form->tab('Radio', function (Form $form) {
            $form->display('title')->value('Dynamic display of radio button boxes');

            $form->radio('radio')
                ->when([1, 4], function (Form $form) {
                    $form->text('text1');
                    $form->text('text2');
                    $form->text('text3');
                })
                ->when(2, function (Form $form) {
                    $form->editor('editor');
                })
                ->when(3, function (Form $form) {
                    $form->image('image');
                })
                ->options($this->options)
                ->default(1);
        });

        $form->tab('Checkbox', function (Form $form) {
            $form->display('title')->value('Check box dynamic display');

            $form->checkbox('checkbox')
                ->when([1, 4], function (Form $form) {
                    $form->text('text1');
                    $form->text('text2');
                    $form->text('text3');
                })
                ->when(2, function (Form $form) {
                    $form->editor('editor');
                })
                ->when(3, function (Form $form) {
                    $form->image('image');
                })
                ->options($this->options);
        });

        $form->tab('Select', function (Form $form) {
            $form->display('title')->value('Dynamic display of drop-down selection boxes');

            $form->select('select')
                ->when([1, 4], function (Form $form) {
                    $form->text('text1');
                    $form->text('text2');
                    $form->text('text3');
                })
                ->when(2, function (Form $form) {
                    $form->editor('editor');
                })
                ->when(3, function (Form $form) {
                    $form->image('image');
                })
                ->options($this->options);
        });

        $form->tab('MultipleSelect', function (Form $form) {
            $form->display('title')->value('Drop-down box multi-select dynamic display');

            $form->multipleSelect('selects')
                ->when([1, 4], function (Form $form) {
                    $form->text('text1');
                    $form->text('text2');
                    $form->text('text3');
                })
                ->when(2, function (Form $form) {
                    $form->editor('editor');
                })
                ->when(3, function (Form $form) {
                    $form->image('image');
                })
                ->options($this->options);
        });

        return $form;
    }
}
