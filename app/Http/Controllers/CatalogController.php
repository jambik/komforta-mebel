<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

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
     * @param Request $request
     * @return Response
     */
    public function category($slug, Request $request)
    {
        $category = Category::findBySlugOrFail($slug);
        $descendants = $category->descendants()->get();

        $children = $descendants->whereLoose('parent_id', $category->id);

        $property      = $request->has('property') ? $request->get('property') : null;
        $propertyValue = $request->has('value')    ? $request->get('value')    : null;

        $products = null;
        if ($property && $propertyValue) {
            $products = Product::whereIn('category_id', $descendants->pluck('id')->push($category->id)->toArray())
                ->leftJoin('product_properties', 'products.id', '=', 'product_properties.product_id')
                ->where('product_properties.'.$property, $propertyValue)
                ->get();
        } else {
            $products = Product::whereIn('category_id', $descendants->pluck('id')->push($category->id)->toArray())->get();
        }

        return view('catalog.category', compact('category', 'children', 'products'));
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