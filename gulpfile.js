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
    .sass('select2-bootstrap.scss')

    .scripts([
        './node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js',
        './node_modules/summernote/dist/summernote.min.js',
        './node_modules/sweetalert/dist/sweetalert.min.js',
        './node_modules/select2/dist/js/select2.min.js',
        './node_modules/select2/dist/js/i18n/en.js',
        './resources/assets/vendors/zoom/zoom.min.js',
        './node_modules/icheck/icheck.min.js',
        // './node_modules/masonry-layout/dist/masonry.pkgd.min.js',
    ], './public/js/libs.js')

    .scripts([
        'app.js'
    ], './public/js/app.js')

    .styles([
        './node_modules/ionicons/css/ionicons.min.css',
        './node_modules/summernote/dist/summernote.css',
        './node_modules/sweetalert/dist/sweetalert.css',
        './node_modules/select2/dist/css/select2.min.css',
        './public/css/select2-bootstrap.css',
        './resources/assets/vendors/zoom/zoom.css',
        './node_modules/icheck/skins/flat/purple.css',
    ], './public/css/libs.css')


    .copy('./node_modules/ionicons/fonts', './public/fonts')
    .copy('./node_modules/summernote/dist/font', './public/css/font')
    .copy('./node_modules/icheck/skins/flat/purple@2x.png', './public/css')
    .copy('./node_modules/icheck/skins/flat/purple.png', './public/css')
    .copy('./resources/assets/images', './public/images')

    // Copy missing files in build folder
    .copy('./node_modules/summernote/dist/font', './public/build/css/font')
    .copy('./node_modules/summernote/dist/font', './public/build/css/font')
    .copy('./node_modules/icheck/skins/flat/purple@2x.png', './public/build/css')
    .copy('./node_modules/icheck/skins/flat/purple.png', './public/build/css')


    .version([
        'css/app.css',
        'css/libs.css',

        'js/app.js',
        'js/libs.js'
    ])
});
