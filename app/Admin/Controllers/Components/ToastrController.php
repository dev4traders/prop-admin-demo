<?php

namespace App\Admin\Controllers\Components;

use Faker\Factory;
use Dcat\Admin\Layout\Content;
use Illuminate\Routing\Controller;

class ToastrController extends Controller
{
    public function index(Content $content)
    {
        $faker = Factory::create();

        admin_toastr($faker->text(200));
        return $content->header('Toastr');
    }
}
