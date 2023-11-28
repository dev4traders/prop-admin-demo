<?php

namespace App\Admin\Actions\Grid;

use App\Admin\Forms\ResetPasswordForm as FormsResetPasswordForm;
use Dcat\Admin\Widgets\Modal;
use Dcat\Admin\Grid\BatchAction;

class BatchResetPasswordBatchAction extends BatchAction
{
    protected $title = 'Change Password';

    public function render()
    {
        $form = FormsResetPasswordForm::make();

        return Modal::make()
            ->lg()
            ->title($this->title)
            ->body($form)
            ->onLoad($this->getModalScript())
            ->button($this->title);
    }

    protected function getModalScript()
    {
        return <<<JS
var key = {$this->getSelectedKeysScript()}

$('#reset-password-id').val(key);
JS;
    }
}
