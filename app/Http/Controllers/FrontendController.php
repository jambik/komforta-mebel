<?php

namespace App\Http\Controllers;

use App\Category;

class FrontendController extends Controller
{
    public function __construct()
    {
        $categories = Category::withDepth()->defaultOrder()->get()->toTree();
        view()->share('categories', $categories);
    }
}
