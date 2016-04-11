<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BackendController;
use App\User;
use DB;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class UsersController extends BackendController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$items = User::all();
        $items = DB::table('users')
                    ->leftJoin('role_user', 'role_user.user_id', '=', 'users.id')
                    ->where('role_user.role_id', null)
                    ->get();

        return view('admin.users.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6'
        ]);

        $item = User::create($request->except('password') + ['password' => bcrypt($request->input('password'))]);

        Flash::success("Запись - {$item->id} сохранена");

        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return User::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $item = User::findOrFail($id);
        $item->password = '';

        return view('admin.users.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Request $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $passwordRule = $request->input('password') ? 'required|min:6' : '';

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => $passwordRule
        ]);

        $item = User::findOrFail($id);

        $item->update($request->except('password') + ($passwordRule ? ['password' => bcrypt($request->input('password'))] : []));

        Flash::success("Запись - {$id} обновлена");

        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        Flash::success("Запись - {$id} удалена");

        return redirect(route('admin.users.index'));
    }

}
