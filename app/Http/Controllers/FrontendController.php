<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductProperties;
use App\Settings;

class FrontendController extends Controller
{
    public function __construct()
    {
        ## Categories
        $categories = Category::withDepth()->defaultOrder()->get()->toTree();

        $propertiesNames = ['style', 'material', 'price', 'equipment', 'size', 'color', 'purpose', 'type', 'kind', 'doors'];

        foreach($categories as $category) {
            $properties = null;

            // Get category products
            $productsId = Product::all()->where('category_id', $category->id)->pluck('id')->all();

            // Get all products properties
            $productsProperties = ProductProperties::all()->whereInLoose('product_id', $productsId);

            // Get each property value array
            foreach ($propertiesNames as $value) {
                $currentProperties = $productsProperties->pluck($value)->unique()->sortBy($value);
                $currentProperties->count() ? $properties[$value] = $currentProperties : null;
            }

            $category->properties = $properties;
        }

        view()->share('categories', $categories);


        ## Settings
        $settings= Settings::find(1);
        view()->share('settings', $settings);
    }
}
