var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    /* App files */
    mix.styles([
        '../../../bower_components/bootswatch/cosmo/bootstrap.min.css',
        '../../../node_modules/font-awesome/css/font-awesome.min.css'
    ], 'public/css/app.bundle.css');
    mix.scripts([
        '../../../node_modules/jquery/dist/jquery.min.js',
        '../../../node_modules/bootstrap/dist/js/bootstrap.min.js'
    ], 'public/js/app.bundle.js');
    mix.copy([
        'node_modules/bootstrap/fonts'
    ], 'public/fonts');


    /* Admin files */
    mix.styles([
        '../../../node_modules/materialize-css/dist/css/materialize.min.css',
        '../../../node_modules/animate.css/animate.min.css',
        '../../../node_modules/sweetalert/dist/sweetalert.css',
        '../../../node_modules/jquery-datetimepicker/jquery.datetimepicker.css',
        '../../../bower_components/dropzone/dist/min/dropzone.min.css'
    ], 'public/css/admin.bundle.css');
    mix.scripts([
        '../../../node_modules/jquery/dist/jquery.min.js',
        '../../../node_modules/vue/dist/vue.min.js',
        '../../../node_modules/materialize-css/dist/js/materialize.min.js',
        '../../../node_modules/noty/js/noty/packaged/jquery.noty.packaged.min.js',
        '../../../node_modules/jquery.scrollto/jquery.scrollTo.min.js',
        '../../../node_modules/sweetalert/dist/sweetalert.min.js',
        '../../../node_modules/tablesorter/dist/js/jquery.tablesorter.combined.min.js',
        '../../../node_modules/tablesorter/dist/js/extras/jquery.tablesorter.pager.min.js',
        '../../../node_modules/jquery-datetimepicker/build/jquery.datetimepicker.full.min.js',
        '../../../bower_components/dropzone/dist/min/dropzone.min.js'
    ], 'public/js/admin.bundle.js');

    /* Jstree Files */
    mix.copy([
        'node_modules/jstree/dist'
    ], 'public/library/jstree');

    /* Materialize-css Files */
    mix.copy([
        'node_modules/materialize-css/dist/font'
    ], 'public/font');

    /* CKEDITOR Files */
    mix.copy([
        'node_modules/ckeditor/ckeditor.js', 'node_modules/ckeditor/contents.css', 'node_modules/ckeditor/styles.js'
    ], 'public/library/ckeditor');
    mix.copy([
        'node_modules/ckeditor/lang/en.js', 'node_modules/ckeditor/lang/ru.js'
    ], 'public/library/ckeditor/lang');
    mix.copy([
        'node_modules/ckeditor/plugins'
    ], 'public/library/ckeditor/plugins');
    mix.copy([
        'node_modules/ckeditor/skins/moono'
    ], 'public/library/ckeditor/skins/moono');
});
