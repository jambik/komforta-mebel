<div class="input-field col s12">
    {!! Form::label('title', 'Заголовок новости') !!}
    {!! Form::text('title', null, ['class' => 'validate'.($errors->has('title') ? ' invalid' : '')]) !!}
</div>

<div class="input-field col s12">
    {!! Form::label('text', 'Текст новости') !!}
    {!! Form::textarea('text', null, ['class' => 'validate input-html materialize-textarea'.($errors->has('text') ? ' invalid' : '')]) !!}
</div>

<div class="input-field col s12">
    {!! Form::label('published_at', 'Дата публикации') !!}
    {!! Form::text('published_at', null, ['class' => 'validate input-datetime'.($errors->has('published_at') ? ' invalid' : '')]) !!}
</div>

<div class="input-field file-field col s12">
    <div class="btn">
        <span>Фото</span>
        <input type="file" name="image">
        {!! Form::file('image') !!}
    </div>
    <div class="file-path-wrapper">
        <input class="file-path validate{{ $errors->has('image') ? ' invalid' : '' }}" type="text" placeholder="Выберите файл">
    </div>
</div>

@if (isset($item) && $item->image)
    <img src="/images/medium/{{ $item->img_url.$item->image }}" alt="" />
@endif

<div class="input-field col s12 center">
    <button type="submit" class="btn-large waves-effect waves-light"><i class="material-icons left">check_circle</i> {{ $submitButtonText }}</button>
</div>

<div class="input-field col s12 center">
    <a href="{{ route('admin.news.index') }}" class="btn grey">Отмена</a>
</div>