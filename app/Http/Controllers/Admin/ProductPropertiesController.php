<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\BackendController;
use App\Product;
use App\ProductProperties;
use App\ProductPropertiesData;
use Flash;
use Illuminate\Http\Request;

class ProductPropertiesController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        /* ---------------------------------------------------------------------------------------------------------- */
        /* Categories                                                                                                 */
        /* ---------------------------------------------------------------------------------------------------------- */
        $categories = Category::withDepth()->defaultOrder()->get()->toTree();

        $propertiesList = trans('vars.properties');

        foreach($categories as $category) {
            $properties = null;

            // Get category products
            $productsId = Product::all()->where('category_id', $category->id)->pluck('id')->all();

            // Get all products properties
            $productsProperties = ProductProperties::all()->whereInLoose('product_id', $productsId);

            // Get each property value array
            foreach ($propertiesList as $property => $propertyName) {
                $currentProperties = $productsProperties->pluck($property, $property.'_slug')->unique()->sortBy($property)->except('');
                $currentProperties->count() ? $properties[$property] = $currentProperties : null;
            }

            $category->properties = $properties;
        }

//        dd($categories);

        return view('admin.product_properties.index', compact('categories'));
    }

    public function property($category, $property, $value)
    {
        $productPropertiesData = ProductPropertiesData::where('category_id', $category)->where('property', $property)->where('value', $value)->first();

        return view('admin.product_properties.property', compact('productPropertiesData'));
    }

    public function propertySave($category, $property, $value, Request $request)
    {
        $productPropertiesData = ProductPropertiesData::firstOrCreate([
            'category_id' => $category,
            'property' => $property,
            'value' => $value,
        ]);

        $productPropertiesData->update($request->all());

//        dd($productPropertiesData->toArray());

        Flash::success("Данные сохранены");

        return redirect(route('admin.product_properties.index'));
    }

}
