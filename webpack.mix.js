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
	.sass('resources/sass/app.scss', 'public/css');

// AdminLTE template

mix.styles([
	'resources/theme/adminlte/plugins/fontawesome-free/css/all.min.css',
	'resources/theme/adminlte/dist/css/adminlte.min.css'
], 'public/css/adminlte.css')
	.scripts([
		'resources/theme/adminlte/plugins/jquery/jquery.min.js',
		'resources/theme/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js',
		'resources/theme/adminlte/plugins/moment/moment.min.js',
		'resources/theme/adminlte/plugins/daterangepicker/daterangepicker.js',
		'resources/theme/adminlte/dist/js/adminlte.min.js',
	], 'public/js/adminlte.js');

