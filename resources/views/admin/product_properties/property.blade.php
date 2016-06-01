@extends('admin.page', ['title' => "Продукты"])

@section('content')
	<h4 class="center">Редактировать мета данные свойства продукта</h4>
	<div class="row">
		<div class="col l8 offset-l2 m12">
            {!! Form::model(isset($productPropertiesData) ? $productPropertiesData : null, ['url' => route('admin.product_properties.property.save', [request()->category, request()->property, request()->value]), 'method' => 'POST']) !!}
                <div class="input-field col s12">
                    {!! Form::label('name', 'Заголовок') !!}
                    {!! Form::text('name', null, ['class' => 'validate'.($errors->has('name') ? ' invalid' : '')]) !!}
                </div>

                <div class="input-field col s12 input-html">
                    {!! Form::label('text', 'Текст на странице') !!}
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

                <div class="input-field col s12 center">
                    <button type="submit" class="btn-large waves-effect waves-light"><i class="material-icons left">check_circle</i> Сохранить</button>
                </div>

                <div class="input-field col s12 center">
                    <a href="{{ route('admin.product_properties.index') }}" class="btn grey waves-effect waves-light">Отмена</a>
                </div>
            {!! Form::close() !!}
		</div>
	</div>
@endsection

@section('head_scripts')
    <script src="/library/ckeditor/ckeditor.js"></script>
@endsection