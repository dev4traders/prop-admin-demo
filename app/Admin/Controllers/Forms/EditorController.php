<?php

namespace App\Admin\Controllers\Forms;

use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Card;
use Dcat\Admin\Widgets\Form;
use Dcat\Admin\Layout\Content;
use App\Admin\Traits\PreviewCode;
use App\Http\Controllers\Controller;

class EditorController extends Controller
{
    use PreviewCode;

    public function tinymce(Content $content)
    {
        return $content
            ->title('TinyMCE')
            ->body($this->buildPreviewButton())
            ->body($this->newline())
            ->body(function (Row $row) {
                $form = Form::make();

                $form->editor('content', 'Test');

                $form->disableSubmitButton();
                $form->disableResetButton();

                $row->column(12, Card::make($form));
            });
    }

    public function markdown(Content $content)
    {
        return $content
            ->title('Markdown')
            ->body($this->buildPreviewButton())
            ->body($this->newline())
            ->body(function (Row $row) {
                $form = Form::make();

                $form->markdown('content', 'Test');

                $form->disableSubmitButton();
                $form->disableResetButton();

                $row->column(12, Card::make($form));
            });
    }

    public function summercode(Content $content)
    {
        return $content
            ->title('Summercode')
            ->body($this->buildPreviewButton())
            ->body($this->newline())
            ->body(function (Row $row) {
                $form = Form::make();

                $form->summercode('content', 'Test');

                $form->disableSubmitButton();
                $form->disableResetButton();

                $row->column(12, Card::make($form));
            });
    }
}
