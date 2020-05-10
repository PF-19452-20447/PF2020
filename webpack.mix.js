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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/datatables.js', 'public/js/datatables.js')
    .js('resources/demo1/src/assets/js/pages/dashboard.js', 'public/js')
    .copy('resources/demo1/src/assets/js/pages/ktavatarsingle.js', 'public/js/ktavatarsingle.js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/datatables.scss', 'public/css')
    .sass('resources/demo1/src/assets/sass/pages/login/login-3.scss', 'public/css')
    .sass('resources/demo1/src/assets/sass/pages/error/error-6.scss', 'public/css');



// copy images folder into laravel public folder
mix.copyDirectory('resources/demo1/src/assets/media', 'public/assets/media');

/**
 * plugins specific issue workaround for webpack
 * @see https://github.com/morrisjs/morris.js/issues/697
 * @see https://stackoverflow.com/questions/33998262/jquery-ui-and-webpack-how-to-manage-it-into-module
 */
mix.webpackConfig({
    resolve: {
        alias: {
            'morris.js': 'morris.js/morris.js',
            'jquery-ui': 'jquery-ui',
        },
    },
});