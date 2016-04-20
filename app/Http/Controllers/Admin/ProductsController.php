<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\BackendController;
use App\Product;
use Flash;
use Illuminate\Http\Request;

class ProductsController extends BackendController
{
    protected $resourceName = null;

    protected $model = null;

    public function __construct()
    {
        $this->resourceName = 'products';
        $this->model = new Product();
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $category = $request->has('category') && $request->has('category') ? $request->get('category') : null;

        $items = $category ? $this->model->whereCategoryId($category)->get() : collect([]);

        $categories = Category::select("categories.*")
                              ->selectRaw('COUNT(products.id) as products_count')
                              ->withDepth()
                              ->leftJoin('products', 'categories.id', '=', 'products.category_id')
                              ->groupBy('categories.id')
                              ->defaultOrder()
                              ->get()
                              ->toFlatTree();

        return view('admin.'.$this->resourceName.'.index', compact('items', 'categories'));
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

        return view('admin.'.$this->resourceName.'.create', compact('categories', 'categoryId'));
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

        $item = $this->model->create($input);

        return redirect(route('admin.'.$this->resourceName.'.index') . '?category='.$item->category_id);
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
        $item = $this->model->findOrFail($id);

        $categories = Category::withDepth()->get()->toFlatTree();

        Category::addSpaces($categories);

        $categories = $categories->lists('name', 'id');

        return view('admin.'.$this->resourceName.'.edit', compact('item', 'categories'));
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
            'slug' => 'required|unique:' . $this->model->getTable() . ',slug,'.$id,
        ]);

        $item = $this->model->findOrFail($id);

        $input = $request->all();

        foreach (['available'] as $value) $input[$value] = $request->has($value) ? true : false;

        $item->update($input);

        return redirect(route('admin.'.$this->resourceName.'.index') . '?category='.$item->category_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $item = $this->model->findOrFail($id);

        $item->delete();

        return redirect(route('admin.'.$this->resourceName.'.index'));
    }

    /**
     * Delete Image
     *
     * @param $id
     * @param Request $request
     * @return Response
     */
    public function imageDelete($id, Request $request)
    {
        $item = $this->model->findOrFail($id);
        $item->deleteImage(true);

        if($request->ajax()) {
            return json_encode([
                'status'  => 'ok',
                'message' => 'Фотография удалена',
            ]);
        }

        Flash::success("Фотография удалена");

        return redirect(route('admin.'.$this->resourceName.'.edit', $id));
    }

    /**
     * Upload photo
     *
     * @param  int  $id
     * @param  Request $request
     * @return Response
     */
    public function photo($id, Request $request)
    {
        $item = $this->model->findOrFail($id);

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

        return redirect(route('admin.'.$this->resourceName.'.index'));
    }

    /**
     * Delete Photo
     *
     * @param $id
     * @param $photoId
     * @param Request $request
     * @return Response
     */
    public function photoDelete($id, $photoId, Request $request)
    {
        $item = $this->model->findOrFail($id);
        $item->deletePhoto($photoId);

        if($request->ajax()) {
            return json_encode([
                'status'  => 'ok',
                'message' => 'Фотография удалена',
            ]);
        }

        Flash::success("Фотография удалена");

        return redirect(route('admin.'.$this->resourceName.'.index'));
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
