@extends('admin.page', ['title' => "Администрирование - Категории"])

@section('content')
    <h1 class="text-center">Категории</h1>

    <div class="row">
        <div class="col-lg-4">
            <div id="jstree-controls">
                <button class="btn btn-success" id="tree-add"><i class="fa fa-plus"></i> Добавить</button>
            </div>
            <div id="jstree">

            </div>
        </div>
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">Категория</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.categories.store') }}">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="col-md-4 control-label">Родительская категория</label>
                            <div class="col-md-6">
                                <input type="hidden" class="form-control" name="parent_id" value="{{ old('parent_id') }}">
                                <strong>{{ old('parent_id') }}</strong>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Название</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Описание</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="about" style="height: 100px;">{{ old('about') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Title (META)</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Keywords (META)</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="keywords" value="{{ old('keywords') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Description (META)</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="description" value="{{ old('description') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-check-square-o"></i> Сохранить
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('head_scripts')
    <link rel="stylesheet" href="/library/jstree/themes/default/style.min.css" />
@endsection

@section('footer_scripts')
    <script src="/library/jstree/jstree.min.js"></script>
    <script src="/js/admin/categories.js"></script>
@endsection