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

    mix

    .sass('app.scss')

    .scripts([
        './node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js',
        './node_modules/summernote/dist/summernote.min.js',
        './node_modules/sweetalert/dist/sweetalert.min.js',
    ], './public/js/libs.js')

    .scripts([
        'app.js'
    ], './public/js/app.js')

    .styles([
        './node_modules/ionicons/css/ionicons.min.css',
        './node_modules/summernote/dist/summernote.css',
        './node_modules/sweetalert/dist/sweetalert.css',
    ], './public/css/libs.css')

    .copy('./node_modules/ionicons/fonts', './public/fonts')
    .copy('./node_modules/summernote/dist/font', './public/css/font')

    .copy('./resources/assets/images', './public/images')

    // .version([
    //     'css/app.css',
    //     'css/libs.css',
    //
    //     'js/app.js',
    //     'js/libs.js'
    // ])
});
