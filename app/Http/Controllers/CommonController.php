<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Mail;
use ReCaptcha\ReCaptcha;
use Validator;

class CommonController extends FrontendController
{
    /**
     * Show the feedback page.
     *
     * @return \Illuminate\Http\Response
     */
    public function feedback()
    {
        return view('feedback');
    }

    /**
     * Send feedback form.
     *
     * @param Request $request
     * @return Response
     */
    public function feedbackSend(Request $request)
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

        return redirect(route('page.show', 'nashi-kontakty'))->with('status', 'Сообщение отправлено');
    }

    /**
     * Send request design form.
     *
     * @param Request $request
     * @return Response
     */
    public function requestDesign(Request $request)
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

        Mail::queue('emails.request_design', ['input' => $request->all()], function ($message) {
            $message->from(env('MAIL_ADDRESS'), env('MAIL_NAME'));
            $message->to(env('MAIL_ADDRESS'));
            $message->subject('Заявка на дизайн/замер');
        });

        if ($request->ajax()){
            return json_encode([
                'status' => 'ok',
                'message' => 'Заявка на дизайн/замер успешно отправлена',
            ]);
        }

        return redirect('feedback')->with('status', 'Заявка на дизайн/замер успешно отправлена');
    }

    /**
     * Send callback form.
     *
     * @param Request $request
     * @return Response
     */
    public function callback(Request $request)
    {
        $rules = [
            'phone' => 'required',
        ];

        $messages = [
            'phone.required' => 'Укажите пожалуйста Ваш телефончик для обратной связи',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails())
        {
            $this->throwValidationException($request, $validator);
        }

        Mail::queue('emails.callback', ['input' => $request->all()], function ($message) {
            $message->from(env('MAIL_ADDRESS'), env('MAIL_NAME'));
            $message->to(env('MAIL_ADDRESS'));
            $message->subject('Обратный звонок');
        });

        if ($request->ajax()){
            return json_encode([
                'status' => 'ok',
                'message' => 'Заявка на обратный звонок отправлена',
            ]);
        }

        return redirect('feedback')->with('status', 'Заявка на обратный звонок отправлена');
    }
}
