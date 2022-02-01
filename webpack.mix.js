const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/map.js', 'public/js')
    .js('resources/js/place.js', 'public/js')
    .js('resources/js/create_place.js', 'public/js')
    .js('resources/js/create_culture.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');
