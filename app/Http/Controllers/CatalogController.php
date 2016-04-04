<?php

namespace App\Http\Controllers;

use App\Category;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::withDepth()->defaultOrder()->get()->toFlatTree();

        return view('catalog.index', compact('categories'));
    }
}