<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\BackendController;
use Flash;
use Illuminate\Http\Request;

class CategoriesController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $items = Category::withDepth()->defaultOrder()->get()->toTree();

        if($request->ajax()) {
            return $items;
        }

        return view('admin.categories.index', compact('items'));
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
        $this->validate($request, [
            'name' => 'required'
        ]);

        $item = Category::create($request->all());

        $item->saveImage($item, $request);

        if ($request->ajax()){
            return $item;
        }

        Flash::success("Запись - {$item->id} сохранена");

        return view('admin.categories.index', compact('item'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
    public function show($id, Request $request)
    {
        $item = Category::findOrFail($id);

        if ($request->ajax()){
            return $item;
        }

        return view('admin.categories.index', compact('item'));
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
        $this->validate($request, [
            'name' => 'required'
        ]);

        $item = Category::findOrFail($id);

        $item->update($request->all());
        $item->saveImage($item, $request);

        $item = Category::findOrFail($id);

        if($request->ajax()) {
            return $item;
        }

        Flash::success("Запись - {$id} обновлена");

        return view('admin.categories.index', compact('item'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        $item = Category::findOrFail($id);

        $item->deleteImageFile();
        $item->delete();

        if ($request->ajax()){
            return json_encode([
                'status' => 'ok'
            ]);
        }

        Flash::success("Запись - {$id} удалена");

        return view('admin.categories.index');
    }

    /**
     * Delete image
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
    public function imageDelete($id, Request $request)
    {
        $category = Category::findOrFail($id);

        $category->deleteImage();

        if ($request->ajax()){
            return json_encode([
                'status' => 'ok',
                'message' => 'Картинка удалена',
            ]);
        }

        Flash::success("Картинка удалена");

        return view('admin.categories.index');
    }

    /**
     * Move category.
     *
     * @param Request $request
     * @return Response
     */
    public function move(Request $request)
    {
        $id = $request->get('id');
        $parent = $request->get('parent');
        $oldParent = $request->get('old_parent');
        $position = $request->get('position');
        $oldPosition = $request->get('old_position');

        $node = Category::findOrFail($id);

        if ($parent != $oldParent) {
            $node->parent_id = $parent;
            $node->save();
        }
        else {
            $diff = abs($position - $oldPosition);
            if ($position > $oldPosition) {
                dump($node->down($diff));
            } else {
                dump($node->up($diff));
            }
        }

        if($request->ajax()){
            return json_encode([
                'status' => 'ok'
            ]);
        }

        Flash::success("Запись - {$id} перемещена");

        return view('admin.categories.index');
    }
}
