<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Page;

class PagesController extends FrontendController
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

        $gallery = $page->slug == 'materialy' ? Gallery::findBySlug('materialy') : null;

        return view('page', compact('page', 'gallery'));
    }
}
