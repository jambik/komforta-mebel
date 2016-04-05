@extends('layouts.app')

@section('title', 'Обратная связь')

@section('content')
    <h1>Обратная связь</h1>
    <form action="{{ route('feedback') }}" method="POST" id="form_feedback">
        {!! Form::token() !!}
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Имя">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="phone" placeholder="Телефон">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="message" placeholder="Сообщение"></textarea>
        </div>
        <div class="form-group">
            <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-block">Отправить сообщение 2</button>
        </div>
    </form>
@endsection