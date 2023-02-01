const mix = require('laravel-mix');
const path = require('path');
const VueLoaderPlugin = require('vue-loader/lib/plugin');

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

mix
    .vue()
    .js('resources/js/app.js', 'public/js')
    .sass('resources/scss/app.scss', 'public/css');

mix.webpackConfig({
    resolve: {
        alias: {
            'App': path.resolve(__dirname, 'resources/js'),
            'App/Components': path.resolve(__dirname, 'resources/js/components'),
            'App/Layout': path.resolve(__dirname, 'resources/js/layout'),
            'Modules': path.resolve(__dirname, 'resources/js/modules'),
        },
    },
    devtool: 'eval-source-map'
})
