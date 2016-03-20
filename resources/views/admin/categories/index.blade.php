@extends('admin.page', ['title' => "Администрирование - Категории"])

@section('content')
    <h4 class="center">Категории</h4>

    <div class="row">
        <div class="col l4 m6">
            <div class="card-panel blue-grey lighten-5">
                <button class="btn waves-effect waves-light" id="node-add" v-on:click="addNode()"><i class="material-icons left">add_circle</i>Добавить</button>
                <button class="btn red waves-effect waves-light" id="node-delete" v-on:click="deleteNode()" v-show="node"><i class="material-icons left">remove_circle</i>удалить</button>
            </div>
            <div class="card-panel">
                <div id="jstree"></div>
            </div>
        </div>
        <div class="col l8 m6">
            <div class="preloader-wrapper small active" v-show="nodeLoading"><div class="spinner-layer spinner-green-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>

            <form id="form-categories" role="form" method="POST" action="" v-show="node">
                {!! csrf_field() !!}
                <input type="hidden" name="_method" value="PUT" v-if="node.id > 0">
                <div class="form-status"></div>

                <div class="input-field col s12">
                    <input type="hidden" id="parent_id" name="parent_id" v-model="node.parent_id">
                    <input id="parent_name" v-model="node.parent_id" disabled="disabled" type="text" class="validate" v-bind:class="{'valid': node.parent_id}">
                    <label for="parent_name" v-bind:class="{'active': node.parent_id}">Родительская категория</label>
                </div>

                <div class="input-field col s12">
                    <input id="name" name="name" v-model="node.name" type="text" class="validate" v-bind:class="{'valid': node.name}">
                    <label for="name" v-bind:class="{'active': node.name}">Название</label>
                </div>

                <div class="input-field col s12">
                    <textarea class="materialize-textarea validate" name="about" id="about" v-bind:class="{'valid': node.about}">@{{ node.about }}</textarea>
                    <label for="about" v-bind:class="{'active': node.about}">Описание</label>
                </div>

                <div class="input-field col s12">
                    <input id="title" name="title" v-model="node.title" type="text" class="validate" v-bind:class="{'valid': node.title}">
                    <label for="title" v-bind:class="{'active': node.title}">Title (META)</label>
                </div>

                <div class="input-field col s12">
                    <input id="keywords" name="keywords" v-model="node.keywords" type="text" class="validate" v-bind:class="{'valid': node.keywords}">
                    <label for="keywords" v-bind:class="{'active': node.keywords}">Keywords (META)</label>
                </div>

                <div class="input-field col s12">
                    <input id="description" name="description" v-model="node.description" type="text" class="validate" v-bind:class="{'valid': node.description}">
                    <label for="description" v-bind:class="{'active': node.description}">Description (META)</label>
                </div>

                <div class="col s12">
                    <button type="submit" class="btn-large form-button waves-effect waves-light"><i class="material-icons left">check_circle</i> Сохранить</button>
                    <div v-show="sendingForm">
                        <div class="preloader-wrapper small active"><div class="spinner-layer spinner-green-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>
                    </div>
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