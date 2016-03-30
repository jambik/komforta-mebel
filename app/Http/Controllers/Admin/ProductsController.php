<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use Flash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $category = $request->has('category') && $request->has('category') ? $request->get('category') : null;

        $items = $category ? Product::whereCategoryId($category)->get() : Product::all();

        $categories = Category::withDepth()->defaultOrder()->get()->toFlatTree();

        return view('admin.products.index', compact('items', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.products.create');
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

        $item = Product::create($request->all());

        $item->saveImage($item, $request);

        Flash::success("Запись - {$item->id} сохранена");

        return redirect(route('admin.products.index'));
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
        $item = Product::findOrFail($id);

        return view('admin.products.edit', compact('item'));
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

        $input = $request->all();

        foreach (['available'] as $value) $input[$value] = $request->has($value) ? true : false;

        $item = Product::findOrFail($id);

        $item->update($input);

        $item->saveImage($item, $request);

        Flash::success("Запись - {$id} обновлена");

        return redirect(route('admin.products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $item = Product::findOrFail($id);

        $item->deleteImageFile();
        $item->deletePhotos();
        $item->delete();

        Flash::success("Запись - {$id} удалена");

        return redirect(route('admin.products.index'));
    }

    /**
     * @param  int  $id
     * @param  Request $request
     * @return Response
     */
    public function photo($id, Request $request)
    {
        $item = Product::findOrFail($id);

        $photoName = $item->savePhoto($request);

        if($request->ajax()) {
            return json_encode([
                'status'  => 'ok',
                'image'   => $photoName,
                'img_url' => $item->img_url,
                'message' => 'Фотография загружена',
            ]);
        }

        Flash::success("Фотография загружена");

        return redirect(route('admin.products.index'));
    }

    /**
     * @param $id
     * @param $photoId
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|string
     */
    public function photoDelete($id, $photoId, Request $request)
    {
        $item = Product::findOrFail($id);
        $item->deletePhoto($photoId);

        if($request->ajax()) {
            return json_encode([
                'status'  => 'ok',
                'message' => 'Фотография удалена',
            ]);
        }

        Flash::success("Фотография загружена");

        return redirect(route('admin.products.index'));
    }

}
