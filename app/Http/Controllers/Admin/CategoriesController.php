<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Flash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $items = Category::all();
        $items = Category::withDepth()->get()->toTree();
//        dd($items);

        if($request->isJson() || $request->has('json')) {
            return $items;
        }

        return view('admin.categories.index', compact('item'));

        return $items;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return true;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required']);

        $item = Category::create($request->all());

        Flash::success("Запись - {$item->id} сохранена");

        return true;
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
        $item = Category::findOrFail($id);

        return true;
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
        $this->validate($request, ['title' => 'required']);

        $item = Category::findOrFail($id);

        $item->update($request->all());

        Flash::success("Запись - {$id} обновлена");

        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Category::destroy($id);

        Flash::success("Запись - {$id} удалена");

        return true;
    }
}
