<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BackendController;
use App\Photo;
use Illuminate\Http\Request;

class PhotosController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $items = Photo::all();

        return view('admin.photos.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.photos.create');
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
            'photo' => 'mimes:jpeg,bmp,png',
        ]);

        Photo::create($request->all());

        return redirect(route('admin.photos.index'));
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
        $item = Photo::findOrFail($id);

        return view('admin.photos.edit', compact('item'));
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
        $item = Photo::findOrFail($id);

        $item->update($request->all());

        return redirect(route('admin.photos.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        Photo::destroy($id);

        if ($request->ajax()){
            return json_encode([
                'status' => 'ok'
            ]);
        }

        return redirect(route('admin.photos.index'));
    }
}
