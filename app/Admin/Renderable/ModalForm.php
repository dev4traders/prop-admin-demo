<?php

namespace App\Admin\Renderable;

use App\Admin\Forms\UserProfile;
use App\Admin\Forms\UserProfileForm;
use Dcat\Admin\Support\LazyRenderable;

class ModalForm extends LazyRenderable
{
    public function render()
    {
        return UserProfileForm::make()->setCurrentUrl($this->current);
    }
}
