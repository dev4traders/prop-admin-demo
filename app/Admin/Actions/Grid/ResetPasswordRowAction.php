<?php

namespace App\Admin\Actions\Grid;

use Dcat\Admin\Widgets\Modal;
use Dcat\Admin\Grid\RowAction;
use App\Admin\Forms\ResetPasswordForm;

class ResetPasswordRowAction extends RowAction
{
    protected $title = '修改密码';

    public function render()
    {
        $form = ResetPasswordForm::make()->payload(['id' => $this->getKey()]);

        return Modal::make()
            ->lg()
            ->title($this->title)
            ->body($form)
            ->button($this->title);
    }
}
