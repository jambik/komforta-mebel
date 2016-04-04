<?php

namespace App\Http\Controllers;

use App\Page;

class PagesController extends Controller
{
    /**
     * Display the page.
     *
     * @param $slug
     * @return Response
     */
    public function show($slug)
    {
        $page = Page::findBySlugOrFail($slug);

        return view('page', compact('page'));
    }
}
