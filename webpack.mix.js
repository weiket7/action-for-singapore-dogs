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
    "public/assets/js/jquery.bxslider.min.js",
    "public/assets/js/jquery-ui.min.js",
    "public/assets/js/axios.min.js",
    "public/assets/js/lodash.min.js",
    "public/assets/js/moment.min.js",
    "public/assets/js/vue.js",
    ], 'public/vendor.js').version()
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

