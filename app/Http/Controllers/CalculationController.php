<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Validator;

class CalculationController extends FrontendController
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
        $rules = [
            'name' => 'required',
            'email' => 'required_if:phone,""',
            'phone' => 'required_if:email,""',
        ];

        $messages = [
            'name.required' => 'Введите Ваше имя. Мы же должны как-то к Вам обращаться :)',
            'email.required_if' => 'А где же ваш email для обратной связи?',
            'phone.required_if' => 'Укажите пожалуйста Ваш телефончик для обратной связи',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails())
        {
            $this->throwValidationException($request, $validator);
        }

        Mail::queue('emails.calculation', ['input' => $request->all(), 'vars' => trans('vars')], function ($message) {
            $message->from(env('MAIL_ADDRESS'), env('MAIL_NAME'));
            $message->to(env('MAIL_ADDRESS'));
            $message->subject('Заявка на расчет');
        });

        return redirect(route('calculation'))->with('status', 'Заявка отправлена');
    }
}