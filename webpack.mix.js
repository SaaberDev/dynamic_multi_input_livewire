const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.styles([
    'resources/css/app.css',
    'node_modules/bootstrap/dist/css/bootstrap.min.css',
    'node_modules/bootstrap/dist/css/bootstrap-grid.min.css',
    'node_modules/bootstrap/dist/css/bootstrap-reboot.min.css',
], 'public/css/app.css');

mix.js([
    'resources/js/app.js',
    'node_modules/@fortawesome/fontawesome-free/js/all.js',
], 'public/js/app.js');
