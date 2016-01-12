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
    mix.sass('app.scss')
        .sass('editor.scss')
        .sass('front.scss')
        .browserify('main.js')
        .browserify('front.js')
        .version(['css/app.css', 'js/main.js', 'css/front.css', 'js/front.js']);
});
