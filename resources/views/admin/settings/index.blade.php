@extends('admin.page', ['title' => "Администрирование - Настройки - Sellmecar"])

@section('content')

    <h4 class="center">Настройки</h4>
    <div class="row">
        <div class="col l6 offset-l3 m8 offset-m2">
            {!! Form::model($settings, ['url' => route('admin.settings.save'), 'method' => 'POST', 'files' => true]) !!}
                <div class="input-field col s12">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', null, ['class' => 'validate']) !!}
                </div>

                <div class="input-field col s12">
                    {!! Form::label('description', 'Описание сайта') !!}
                    {!! Form::textarea('description', null, ['class' => 'materialize-textarea validate']) !!}
                </div>

                <div class="col s12 center">
                    {!! Form::submit('Сохранить настройки', ['class' => 'btn-large']) !!}
                </div>

                <div>&nbsp;</div>

                <div class="col s12 center">
                    <a href="{{ route('admin') }}" class="btn grey">Отмена</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection
