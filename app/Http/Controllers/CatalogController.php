<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductPropertiesData;

class CatalogController extends FrontendController
{
    /**
     * Display catalog index page.
     *
     * @return Response
     */
    public function index()
    {
        return view('catalog.index');
    }

    /**
     * Display category page.
     *
     * @param $slug
     * @param null $property
     * @param null $value
     * @return Response
     * @internal param Request $request
     */
    public function category($slug, $property = null, $value = null)
    {
        $category = Category::findBySlugOrFail($slug);
        $descendants = $category->descendants()->get();

        $children = $descendants->whereLoose('parent_id', $category->id);

        $property      = $property ? $property : null;
        $propertyValue = $value    ? $value    : null;

        $products = null;
        $productPropertiesData = null;
        if ($property && $propertyValue) {
            $products = Product::whereIn('category_id', $descendants->pluck('id')->push($category->id)->toArray())
                ->leftJoin('product_properties', 'products.id', '=', 'product_properties.product_id')
                ->where('product_properties.'.$property.'_slug', $propertyValue)
                ->get();

            $productPropertiesData = ProductPropertiesData::where('category_id', $category->id)->where('property', $property)->where('value', $value)->first();
        } else {
            $products = Product::whereIn('category_id', $descendants->pluck('id')->push($category->id)->toArray())->get();
        }

        return view('catalog.category', compact('category', 'children', 'products', 'productPropertiesData'));
    }

    /**
     * Display product page.
     *
     * @param $slug
     * @return Response
     */
    public function product($slug)
    {
        $product = Product::findBySlugOrFail($slug);
        $category = $product->category;

        $sameProductsCount = 3;
        $sameProducts      = Product::all();
        $sameProducts      = $sameProducts->random($sameProducts->count() < $sameProductsCount ? $sameProducts->count() : $sameProductsCount);

        return view('catalog.product', compact('category', 'product', 'sameProducts'));
    }
}