<?php

namespace App\Admin\Forms;

use Dcat\Admin\Contracts\LazyRenderable;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Widgets\Form;

class UserProfileForm extends Form implements LazyRenderable
{
    use LazyWidget;

    public function handle(array $input)
    {
        return $this->success('updated');
    }

    public function form()
    {
        $this->text('name', trans('admin.name'))->required()->help('help');
        $this->image('avatar', trans('admin.avatar'))->autoUpload();

        $this->password('old_password', trans('admin.old_password'));

        $this->password('password', trans('admin.password'))
            ->minLength(5)
            ->maxLength(20)
            ->customFormat(function ($v) {
                if ($v == $this->password) {
                    return;
                }

                return $v;
            })
            ->help('from 5 to chars20');
        $this->password('password_confirmation', trans('admin.password_confirmation'))
            ->same('password')
            ->help('same pwd');
    }
}
