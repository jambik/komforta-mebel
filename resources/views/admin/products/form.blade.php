<div class="input-field col s12">
    {!! Form::label('name', 'Название') !!}
    {!! Form::text('name', null, ['class' => 'validate'.($errors->has('name') ? ' invalid' : '')]) !!}
</div>

@if (isset($item))
    <div class="input-field col s12">
        {!! Form::label('slug', 'Alias') !!}
        {!! Form::text('slug', null, ['class' => 'validate'.($errors->has('slug') ? ' invalid' : '')]) !!}
        <small>alias для красивого отображения url</small>
    </div>
@endif

<div class="input-field col s12">
    {!! Form::label('price', 'Цена') !!}
    {!! Form::text('price', null, ['class' => 'validate'.($errors->has('price') ? ' invalid' : '')]) !!}
</div>

<div class="input-field col s12">
    {!! Form::select('category_id', $categories, isset($categoryId) ? $categoryId : null, ['class' => 'validate'.($errors->has('category_id') ? ' invalid' : '')]) !!}
    {!! Form::label('category_id', 'Категория') !!}
</div>

<div class="input-field col s12">
    <select name="material" id="material">
        <option value="0">- Выберите материал -</option>
        @foreach (trans('vars.material') as $key => $val)<option value="{{ $key }}"{{ isset($item) && $item->material == $key ? ' selected' : '' }}>{{ $val }}</option>@endforeach
    </select>
    {!! Form::label('material', 'Материал') !!}
</div>

<div class="input-field col s12 input-checkbox">
    {!! Form::checkbox('available', 1, null, ['id' => 'available', 'class' => $errors->has('available') ? ' invalid' : '']) !!}
    {!! Form::label('available', 'Доступность') !!}
</div>

<div class="input-field col s12">
    {!! Form::label('brief', 'Краткое описание продукта') !!}
    {!! Form::textarea('brief', null, ['class' => 'validate materialize-textarea'.($errors->has('brief') ? ' invalid' : '')]) !!}
</div>

<div class="input-field col s12 input-html">
    {!! Form::label('text', 'Полное описание продукта') !!}
    {!! Form::textarea('text', null, ['class' => 'validate materialize-textarea'.($errors->has('text') ? ' invalid' : '')]) !!}
</div>

<div class="input-field col s12">
    {!! Form::label('title', 'Title (META)') !!}
    {!! Form::text('title', null, ['class' => 'validate'.($errors->has('title') ? ' invalid' : '')]) !!}
</div>

<div class="input-field col s12">
    {!! Form::label('keywords', 'Keywords (META)') !!}
    {!! Form::text('keywords', null, ['class' => 'validate'.($errors->has('keywords') ? ' invalid' : '')]) !!}
</div>

<div class="input-field col s12">
    {!! Form::label('description', 'Description (META)') !!}
    {!! Form::text('description', null, ['class' => 'validate'.($errors->has('description') ? ' invalid' : '')]) !!}
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
        <div><img src="/images/medium/{{ $item->img_url.$item->image }}" alt="" /></div>
        <button class="btn btn-small red waves-effect waves-light" type="button" title="Удалить фото" onclick="deleteImage(this)" data-request-url="{{ route('admin.products.image.delete', $item->id) }}"><i class="material-icons">delete</i></button>
        <div class="preloader-wrapper small active preloader" style="display: none;"><div class="spinner-layer spinner-red-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>
    </div>
@endif

<div class="input-field col s12 center">
    <button type="submit" class="btn-large waves-effect waves-light"><i class="material-icons left">check_circle</i> {{ $submitButtonText }}</button>
</div>

<div class="input-field col s12 center">
    <a href="{{ isset($item) ? route('admin.products.index') . '?category=' . $item->category_id : session()->previousUrl() }}" class="btn grey waves-effect waves-light">Отмена</a>
</div>

@section('head_scripts')
    <script src="/library/ckeditor/ckeditor.js"></script>
@endsection