<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Page;
use Illuminate\Http\Request;
use Mail;
use ReCaptcha\ReCaptcha;
use Validator;

class FeedbackController extends Controller
{
    /**
     * Show the feedback page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('feedback');
    }

    /**
     * Send feedback form.
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
            'message' => 'required',
        ];

        $messages = [
            'name.required' => 'Введите Ваше имя. Мы же должны как-то к Вам обращаться :)',
            'email.required_if' => 'А где же ваш email для обратной связи?',
            'phone.required_if' => 'Укажите пожалуйста Ваш телефончик для обратной связи',
            'message.required' => 'А где собственно сообщение?',
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

        Mail::queue('emails.feedback', ['input' => $request->all()], function ($message) {
            $message->from(env('MAIL_ADDRESS'), env('MAIL_NAME'));
            $message->to(env('MAIL_ADDRESS'));
            $message->subject('Обратная связь');
        });

        return redirect('feedback')->with('status', 'Сообщение отправлено');
    }
}
