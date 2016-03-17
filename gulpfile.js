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
        '../../../node_modules/bootstrap/dist/css/bootstrap.min.css',
        //'../../../node_modules/bootstrap/dist/css/bootstrap-theme.min.css',
        '../../../node_modules/font-awesome/css/font-awesome.min.css',
        '../../../node_modules/select2/dist/css/select2.min.css',
        '../../../node_modules/tablesorter/dist/css/theme.bootstrap.min.css',
        '../../../node_modules/animate.css/animate.min.css',
        '../../../node_modules/sweetalert/dist/sweetalert.css',
        '../../../bower_components/moment/min/moment-with-locales.min.js',
        '../../../bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css'
    ], 'public/css/app.bundle.css');
    mix.scripts([
        '../../../node_modules/jquery/dist/jquery.min.js',
        '../../../node_modules/bootstrap/dist/js/bootstrap.min.js',
        '../../../node_modules/select2/dist/js/select2.min.js',
        '../../../node_modules/select2/dist/js/i18n/ru.js',
        '../../../node_modules/noty/js/noty/packaged/jquery.noty.packaged.min.js',
        '../../../node_modules/tablesorter/dist/js/jquery.tablesorter.combined.min.js',
        '../../../node_modules/sweetalert/dist/sweetalert.min.js',
        '../../../bower_components/moment/min/moment-with-locales.min.js',
        '../../../bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
        '../../../bower_components/scrollup/dist/jquery.scrollUp.min.js'
    ], 'public/js/app.bundle.js');
    mix.copy([
        'node_modules/font-awesome/fonts',
        'node_modules/bootstrap/fonts'
    ], 'public/fonts');


    /* Admin files */
    mix.styles([
        '../../../node_modules/bootstrap/dist/css/bootstrap.min.css',
        //'../../../node_modules/bootstrap/dist/css/bootstrap-theme.min.css',
        '../../../node_modules/font-awesome/css/font-awesome.min.css',
        '../../../node_modules/select2/dist/css/select2.min.css',
        '../../../node_modules/tablesorter/dist/css/theme.bootstrap.min.css',
        '../../../node_modules/animate.css/animate.min.css',
        '../../../bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css'
    ], 'public/css/admin.bundle.css');
    mix.scripts([
        '../../../node_modules/jquery/dist/jquery.min.js',
        '../../../node_modules/bootstrap/dist/js/bootstrap.min.js',
        '../../../node_modules/select2/dist/js/select2.min.js',
        '../../../node_modules/select2/dist/js/i18n/ru.js',
        '../../../node_modules/noty/js/noty/packaged/jquery.noty.packaged.min.js',
        '../../../node_modules/tablesorter/dist/js/jquery.tablesorter.combined.min.js',
        '../../../node_modules/tablesorter/dist/js/extras/jquery.tablesorter.pager.min.js',
        '../../../bower_components/moment/min/moment-with-locales.min.js',
        '../../../bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js'
    ], 'public/js/admin.bundle.js');
    mix.copy([
        'node_modules/jstree/dist'
    ], 'public/library/jstree');
});

