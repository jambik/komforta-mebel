<?php

namespace App\Http\Controllers;

use App\Category;
use App\Settings;

class FrontendController extends Controller
{
    public function __construct()
    {
        $categories = Category::withDepth()->defaultOrder()->get()->toTree();
        $settings   = Settings::find(1);

        view()->share('categories', $categories);
        view()->share('settings', $settings);
    }
}
