<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Http\Controllers\BackendController;
use Flash;
use Illuminate\Http\Request;

class GalleriesController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $items = Gallery::all();

        return view('admin.galleries.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.galleries.create');
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

        Gallery::create($request->all());

        return redirect(route('admin.galleries.index'));
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
        $item = Gallery::findOrFail($id);

        return view('admin.galleries.edit', compact('item'));
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

        $item = Gallery::findOrFail($id);

        $item->update($request->all());

        return redirect(route('admin.galleries.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $item = Gallery::findOrFail($id);

        $item->deletePhotos();
        $item->delete();

        return redirect(route('admin.galleries.index'));
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
        $item = Gallery::findOrFail($id);

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

        return redirect(route('admin.galleries.index'));
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
        $item = Gallery::findOrFail($id);
        $item->deletePhoto($photoId);

        if($request->ajax()) {
            return json_encode([
                'status'  => 'ok',
                'message' => 'Фотография удалена',
            ]);
        }

        Flash::success("Фотография загружена");

        return redirect(route('admin.galleries.index'));
    }
}
