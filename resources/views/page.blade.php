@extends('layouts.app')

@section('title', $page->title)

@section('content')
    @include('partials._status')
    @include('partials._errors')

    {!! $page->text !!}

    @if ($page->slug == 'nashi-kontakty')
        <div>&nbsp;</div>
        <hr>
        <div>&nbsp;</div>
        <h3>Обратная связь</h3>
        <div>&nbsp;</div>
        <form action="{{ route('feedback.send') }}" method="POST" id="form_feedback">
            {!! Form::token() !!}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <input type="text" class="form-control" name="name" placeholder="Имя" value="{{ old('name') }}">
            </div>
            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <input type="text" class="form-control" name="phone" placeholder="Телефон" value="{{ old('phone') }}">
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
            </div>
            <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                <textarea class="form-control" name="message" placeholder="Сообщение" style="min-height: 150px;">{{ old('message') }}</textarea>
            </div>
            <div class="form-group">
                <div id="recaptchaFeedback"></div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block">Отправить сообщение</button>
            </div>
        </form>
    @endif

    @if ($page->slug == 'materialy')
        <div>&nbsp;</div>
        <hr>
        <div>&nbsp;</div>
        @if (isset($gallery->photos) && $gallery->photos->count())
            <div class="gallery-photos">
                @foreach ($gallery->photos as $val)
                    <a class="popup-gallery" title="{{ $val->name }}" href="/images/original/{{ $val->img_url . $val->image }}"><img src="/images/small/{{ $val->img_url . $val->image }}" class="img-thumbnail" alt="{{ $val->name }}"></a>
                @endforeach
            </div>
        @endif
    @endif
@endsection