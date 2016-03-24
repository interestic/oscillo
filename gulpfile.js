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
      '../bower/jquery/dist/jquery.min.js',
      '../bower/what-input/what-input.min.js',
      '../bower/foundation-sites/dist/foundation.min.js',
      '../bower/angular/angular.min.js',
      '../bower/ngInfiniteScroll/build/ng-infinite-scroll.min.js',
      '../bower/d3/d3.min.js',
      '../bower/c3/c3.min.js',
      '../bower/c3-angular/c3-angular.min.js',
      'uservoice.js',
      'ng/app.js',
      'ng/components/home/homeIndexController.js'
    ], 'public/js/app.js')
    .scripts([
      'ng/components/home/homeDashboardController.js'
    ], 'public/js/dashboard.js')
    .phpUnit();
});
