<div class="input-field col s12">
    {!! Form::label('title', 'Заголовок слайда') !!}
    {!! Form::text('title', null, ['class' => 'validate'.($errors->has('title') ? ' invalid' : '')]) !!}
</div>

<div class="input-field col s12">
    {!! Form::label('text', 'Текст слайда') !!}
    {!! Form::textarea('text', null, ['class' => 'validate materialize-textarea'.($errors->has('text') ? ' invalid' : '')]) !!}
</div>

<div class="input-field col s12">
    {!! Form::label('url', 'Url (ссылка)') !!}
    {!! Form::text('url', null, ['class' => 'validate materialize-textarea'.($errors->has('url') ? ' invalid' : '')]) !!}
</div>

<div class="input-field file-field col s12">
    <div class="btn">
        <span>Фото</span>
        {!! Form::file('image') !!}
    </div>
    <div class="file-path-wrapper">
        <input class="file-path validate{{ $errors->has('image') ? ' invalid' : '' }}" type="text" placeholder="Выберите файл">
    </div>
</div>

@if (isset($item) && $item->image)
    <div class="col s12">
        <img src="/images/medium/{{ $item->img_url.$item->image }}" alt="" />
    </div>
@endif

<div class="input-field col s12 center">
    <button type="submit" class="btn-large waves-effect waves-light"><i class="material-icons left">check_circle</i> {{ $submitButtonText }}</button>
</div>

<div class="input-field col s12 center">
    <a href="{{ route('admin.slides.index') }}" class="btn grey waves-effect waves-light">Отмена</a>
</div>

@section('head_scripts')
    <script src="/library/ckeditor/ckeditor.js"></script>
@endsection