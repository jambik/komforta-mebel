<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Http\Controllers\BackendController;
use Flash;
use Illuminate\Http\Request;

class GalleriesController extends BackendController
{
    protected $resourceName = null;

    protected $model = null;

    public function __construct()
    {
        $this->resourceName = 'galleries';
        $this->model = new Gallery();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $items = $this->model->all();

        return view('admin.'.$this->resourceName.'.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.'.$this->resourceName.'.create');
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

        foreach (['page'] as $value) $input[$value] = $request->has($value) ? true : false;

        $item = $this->model->create($input);

        return redirect(route('admin.'.$this->resourceName.'.index'));
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

        return view('admin.'.$this->resourceName.'.edit', compact('item'));
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

        foreach (['page'] as $value) $input[$value] = $request->has($value) ? true : false;

        $item->update($input);

        return redirect(route('admin.'.$this->resourceName.'.index'));
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
     * Delete photo
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
}
