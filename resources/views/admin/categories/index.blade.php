@extends('admin.page', ['title' => "Администрирование - Категории"])

@section('content')
    <h4 class="center">Категории</h4>

    <div class="row">
        <div class="col l4">
            <div id="jstree-controls">
                <button class="btn" id="tree-add"><i class="material-icons left">add_circle</i>Добавить</button>
            </div>
            <div id="jstree">

            </div>
        </div>
        <div class="col l8">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.categories.store') }}">
                {!! csrf_field() !!}

                <div class="input-field col s12">
                    <input type="hidden" name="parent_id" value="{{ old('parent_id') }}">
                    <input id="parent_name" type="text" value="#" class="validate">
                    <label for="parent_name">Родительская категория</label>
                </div>

                <div class="input-field col s12">
                    <input id="name" name="name" type="text" value="{{ old('name') }}" class="validate">
                    <label for="name">Название</label>
                </div>

                <div class="input-field col s12">
                    <textarea class="materialize-textarea validate" name="about" id="about">{{ old('about') }}</textarea>
                    <label for="about">Описание</label>
                </div>

                <div class="input-field col s12">
                    <input id="title" name="title" type="text" value="{{ old('title') }}" class="validate">
                    <label for="title">Title (META)</label>
                </div>

                <div class="input-field col s12">
                    <input id="keywords" name="keywords" type="text" value="{{ old('keywords') }}" class="validate">
                    <label for="keywords">Keywords (META)</label>
                </div>

                <div class="input-field col s12">
                    <input id="description" name="description" type="text" value="{{ old('description') }}" class="validate">
                    <label for="description">Description (META)</label>
                </div>

                <div class="col s12">
                    <button type="submit" class="btn-large"><i class="material-icons left">check_circle</i> Сохранить</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('head_scripts')
    <link rel="stylesheet" href="/library/jstree/themes/default/style.min.css" />
    <link rel="stylesheet" href="/css/admin/categories.css" />
@endsection

@section('footer_scripts')
    <script src="/library/jstree/jstree.min.js"></script>
    <script src="/js/admin/categories.js"></script>
@endsection