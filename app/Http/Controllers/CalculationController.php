<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculationController extends Controller
{
    /**
     * Display calculation page.
     *
     * @return Response
     */
    public function calculate()
    {
        return view('calculation');
    }

    /**
     * Send calculation page.
     *
     * @param Request $request
     * @return Response
     */
    public function send(Request $request)
    {
        dd($request->all());

        $this->validate($request, [
            'noname' => 'required'
        ]);

        return redirect(route('calculation'));
    }
}