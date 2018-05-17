let mix = require('laravel-mix');

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
mix.js([
	'resources/assets/talvbansal/media-manager/js/media-manager.js',
	'resources/assets/js/media-manager-custom.js'
	], 'public/js/mediamanager.js')
   .styles('resources/assets/talvbansal/media-manager/css/media-manager.css', 'public/css/mediamanager.css');

 mix.scripts([
 	'resources/assets/js/jquery.min.js',
 	'resources/assets/js/bootstrap.min.js',
 	'resources/assets/js/popper.min.js',
 	'resources/assets/js/jquery.slimscroll.js',
 	'resources/assets/js/sidebarmenu.js',
 	'resources/assets/js/sticky-kit.min.js',
 	'resources/assets/js/custom.min.js',
 	'resources/assets/js/font-awesome.all.js',
 	'resources/assets/js/jquery.nicescroll.min.js',
 	'resources/assets/js/jquery.validate.min.js',
 	'resources/assets/js/jquery.validate.unobtrusive.min.js',
 	'resources/assets/js/scroll.js',

 	], 'public/js/dashboard.js')
 .styles([
 	'resources/assets/css/bootstrap.min.css',
 	'resources/assets/css/helper.css',
 	'resources/assets/css/style.css',
 	'resources/assets/css/spinners.css',
 	'resources/assets/css/font-awesome.min.css',
 	'resources/assets/css/simple-line-icons.css',
 	'resources/assets/css/weather-icons.min.css',
 	'resources/assets/css/linea.css',
 	'resources/assets/css/themify-icons.css',
 	'resources/assets/css/flag-icon.min.css',
 	'resources/assets/css/materialdesignicons.min.css',
 	'resources/assets/css/animate.css'
 	], 'public/css/dashboard.css');