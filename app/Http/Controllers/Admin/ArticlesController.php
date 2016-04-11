<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Http\Controllers\BackendController;
use Illuminate\Http\Request;

class ArticlesController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $items = Article::sorted()->get();

        return view('admin.articles.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        Article::create($request->all());

        return redirect(route('admin.articles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $item = Article::findOrFail($id);

        return view('admin.articles.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required|alpha_dash|unique:articles,slug,'.$id,
        ]);

        $item = Article::findOrFail($id);

        $item->update($request->all());

        return redirect(route('admin.articles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Article::destroy($id);

        return redirect(route('admin.articles.index'));
    }
}
