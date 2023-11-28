<?php

namespace App\Admin\Forms;

use Dcat\Admin\Widgets\Form;
use Dcat\Admin\Support\Helper;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Models\Administrator;
use Dcat\Admin\Contracts\LazyRenderable;

class ResetPasswordForm extends Form implements LazyRenderable
{
    use LazyWidget;

    public function handle(array $input)
    {
        //$id = $this->payload['id'] ?? null;
        $id = Helper::array($input['id'] ?? null);

        $password = $input['password'] ?? null;

        if (! $id) {
            return $this->error('参数错误');
        }

        $user = Administrator::find($id);

        if (! $user) {
            return $this->error('Not found');
        }

        $user->update(['password' => bcrypt($password)]);

        return $this->success('Password reset complete');
    }

    public function form()
    {
        //$id = $this->payload['id'] ?? null;

        $this->password('password')->required();
        $this->password('password_confirm')->same('password');

        $this->hidden('id')->attribute('id', 'reset-password-id');
    }

    public function default()
    {
        return [
            'password'         => '',
            'password_confirm' => '',
        ];
    }
}
