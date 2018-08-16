let mix = require('laravel-mix');
const webpack = require('webpack');

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



mix
  //.js('resources/assets/app.js', 'public')
  .js('resources/admin/admin.js', 'public')
  .combine([
    "resources/vendor/jquery.bxslider.min.js",
    "resources/vendor/jquery-ui.min.js",
    "resources/vendor/axios.min.js",
    "resources/vendor/lodash.min.js",
    "resources/vendor/moment.min.js",
    "resources/vendor/vue.js",
    ], 'public/vendor.js')
  .combine([
    "resources/common/errors.js",
    "resources/common/filters.js",
    "resources/heart.js",
    "resources/adopt-item.js",
    "resources/volunteer-field.js",
  ], 'public/app.js')
  .webpackConfig({
    plugins: [
      new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/),
      /*new webpack.ProvidePlugin({
        $: "jquery",
        jQuery: "jquery"
      })*/
    ]
  })
  .disableSuccessNotifications();