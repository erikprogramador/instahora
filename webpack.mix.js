let mix = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/scss/app.scss', 'public/css')
   .copy('node_modules/font-awesome/css/font-awesome.css', 'public/css')
   .copy('node_modules/font-awesome/fonts/', 'public/fonts');
