<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;

class CatalogController extends FrontendController
{
    /**
     * Display catalog index page.
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::withDepth()->defaultOrder()->get()->toFlatTree();

        return view('catalog.index', compact('categories'));
    }

    /**
     * Display category page.
     *
     * @param $slug
     * @return Response
     */
    public function category($slug)
    {
        $category = Category::findBySlugOrFail($slug);
        $descendants = $category->descendants()->get();
        $children = $descendants->whereLoose('parent_id', $category->id);

        $products = Product::whereIn('category_id', $descendants->pluck('id')->push($category->id)->toArray())->get();

//        dump($children->toArray());
//        dump($descendants->toArray());
//        dump($descendants->pluck('id'));
//        dump($products->toArray());
//        dump($category->ancestors()->get()->toArray());

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

//        dump($sameProducts->toArray());
//        dump($children->toArray());
//        dump($descendants->toArray());
//        dump($descendants->pluck('id'));
//        dump($products->toArray());
//        dump($category->ancestors()->get()->toArray());

        return view('catalog.product', compact('category', 'product', 'sameProducts'));
    }
}