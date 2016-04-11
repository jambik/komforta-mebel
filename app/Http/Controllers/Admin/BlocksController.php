<?php

namespace App\Http\Controllers\Admin;

use App\Block;
use App\Http\Controllers\BackendController;
use Illuminate\Http\Request;

class BlocksController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $items = Block::all();

        return view('admin.blocks.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.blocks.create');
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
            'alias' => 'required|unique:blocks,alias',
        ]);

        $item = Block::create($request->all());

        return redirect(route('admin.blocks.index'));
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
        $item = Block::findOrFail($id);

        return view('admin.blocks.edit', compact('item'));
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
            'alias' => 'required|unique:blocks,alias,'.$id
        ]);

        $item = Block::findOrFail($id);

        $item->update($request->all());

        return redirect(route('admin.blocks.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Block::destroy($id);

        return redirect(route('admin.blocks.index'));
    }
}
