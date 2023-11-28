<?php

namespace App\Admin\Actions;

use App\Admin\Forms\UserProfileForm;
use Dcat\Admin\Actions\Action;
use Dcat\Admin\Widgets\Modal;

class AdminSettingAction extends Action
{
    /**
     * @return string
     */
	protected $title = 'UserProfileForm';

    public function render()
    {
        $modal = Modal::make()
            ->id('user-profile')
            ->title($this->title())
            ->body(new UserProfileForm())
            ->lg()
            ->button(
                <<<HTML
<ul class="nav navbar-nav">
    <li>{$this->title}User Profile</li>
</ul>
HTML
            );

        return $modal->render();
    }
}
