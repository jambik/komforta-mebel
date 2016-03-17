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
            details
        </div>
    </div>
@endsection

@section('head_scripts')
    <link rel="stylesheet" href="/library/jstree/themes/default/style.min.css" />
@endsection

@section('footer_scripts')
    <script src="/library/jstree/jstree.min.js"></script>
@endsection