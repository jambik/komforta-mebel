<?php

namespace App\Services;

use App\Category;

class CategoriesService
{
    public function menu()
    {
        $categories = Category::withDepth()->defaultOrder()->get()->toTree();

        return $categories;
    }
}