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
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $category = $request->has('category') && $request->has('category') ? $request->get('category') : null;

        $items = $category ? Product::whereCategoryId($category)->get() : Product::all();

        $categories = Category::select("categories.*")
                              ->selectRaw('COUNT(products.id) as products_count')
                              ->withDepth()
                              ->leftJoin('products', 'categories.id', '=', 'products.category_id')
                              ->groupBy('categories.id')
                              ->defaultOrder()
                              ->get()
                              ->toFlatTree();

        return view('admin.products.index', compact('items', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        $categories = Category::withDepth()->get()->toFlatTree();

        Category::addSpaces($categories);

        $categories = $categories->lists('name', 'id');

        $categoryId = $this->hasParamInPreviousUrl('category', $request);

        return view('admin.products.create', compact('categories', 'categoryId'));
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

        $input = $request->all();

        foreach (['available'] as $value) $input[$value] = $request->has($value) ? true : false;

        $item = Product::create($input);

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

        $categories = Category::withDepth()->get()->toFlatTree();

        Category::addSpaces($categories);

        $categories = $categories->lists('name', 'id');

        return view('admin.products.edit', compact('item', 'categories'));
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
            'slug' => 'required|alpha_dash|unique:products,slug,'.$id,
        ]);

        $item = Product::findOrFail($id);

        $input = $request->all();

        foreach (['available'] as $value) $input[$value] = $request->has($value) ? true : false;

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
     * @return Response
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

    /**
     * Получаем параметр category из previous url, для того чтобы при создании выбиралась нужная каегория
     *
     * @param $param
     * @param Request $request
     * @return string|bool
     */
    public function hasParamInPreviousUrl($param, Request $request)
    {
        $previousUrl = $request->session()->previousUrl();
        parse_str(parse_url($previousUrl, PHP_URL_QUERY), $queryParams);

        return isset($queryParams[$param]) ? $queryParams[$param] : false;
    }

}
