<?php

namespace App\Http\Composers;

use App\Category;
use Illuminate\View\View;

class CategoriesComposer
{
    public function compose(View $view)
    {
        $categories = Category::withDepth()->defaultOrder()->get()->toTree();

        $view->with('categories', $categories);
    }
}