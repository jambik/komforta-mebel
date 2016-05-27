<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Page;
use App\Product;
use Illuminate\Http\Request;

class IndexController extends FrontendController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = Page::find(1);

        $products1 = Product::whereCategoryId('80')->limit(3)->get();
        $products2 = Product::whereCategoryId('103')->limit(3)->get();
        $products3 = Product::whereCategoryId('56')->limit(3)->get();

        return view('index', compact('page', 'products1', 'products2', 'products3'));
    }
}
