var elixir = require('laravel-elixir');
elixir.config.sourcemaps = false;

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
  mix.sass([
      'app.scss',
      '_settings.scss'
    ], 'public/css/app.css')
    .scripts([
      'uservoice.js',
      'ng/app.js',
      'ng/components/home/homeIndexController.js',
      'ng/components/home/homeDirective.js'
    ], 'public/js/app.js')
    .scripts([
      'ng/components/home/homeDashboardController.js'
    ], 'public/js/dashboard.js')
    .phpUnit();
});
