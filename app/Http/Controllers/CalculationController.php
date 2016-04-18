<?php

namespace App\Http\Controllers;

use App\CupboardHeight;
use App\Settings;
use Illuminate\Http\Request;
use Mail;
use ReCaptcha\ReCaptcha;
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
        $cupboardHeights = CupboardHeight::lists('name', 'id')->all();

        return view('calculation', compact('cupboardHeights'));
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

        $validator->after(function($validator) use ($request)
        {
            $recaptcha = new ReCaptcha(env('GOOGLE_RECAPTCHA_SECRET'));
            $resp = $recaptcha->verify($request->get('g-recaptcha-response'), $_SERVER['REMOTE_ADDR']);

            if ( ! $resp->isSuccess())
            {
                $validator->errors()->add('google_recaptcha_error', 'Ошибка reCAPTCHA: '.implode(', ', $resp->getErrorCodes()));
            }
        });

        if ($validator->fails())
        {
            $this->throwValidationException($request, $validator);
        }

        $settings = Settings::find(1);

        $data = [
            'input' => $request->all(),
            'vars' => trans('vars'),
            'cupboardHeights' => CupboardHeight::lists('name', 'id')->all(),
        ];

        Mail::queue('emails.calculation', $data, function ($message) use ($settings) {
            $message->from(env('MAIL_ADDRESS'), env('MAIL_NAME'));
            $message->to($settings->email);
            $message->subject('Заявка на расчет');
        });

        return redirect(route('calculation'))->with('status', 'Заявка отправлена');
    }
}