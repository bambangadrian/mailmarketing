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

elixir(function (mix) {
    mix.sass('app.scss', 'public/assets/css/app.css');
    mix.sass('login.scss', 'public/assets/css/login.css');
    mix.sass('detail.scss', 'public/assets/css/detail.css');
    mix.sass('Dss/Consistency/detail.scss', 'public/assets/css/Dss/Consistency/detail.css');
    mix.sass('Dss/Priority/detail.scss', 'public/assets/css/Dss/Priority/detail.css');
    mix.scripts('Dss/Priority/detail.js', 'public/assets/js/Dss/Priority/detail.js');
});