var elixir = require('laravel-elixir');

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

elixir.config.sourcemaps = false

elixir(function(mix) {
	// Styles
	mix.copy('bower_components/font-awesome/fonts', 'public/build/fonts')
	mix.less([
		'libs.less',
		'app.less'
	])

	// Scripts
	mix.copy('bower_components/jquery/dist/jquery.js', 'resources/assets/js/jquery.js')
	mix.copy('bower_components/bootstrap/dist/js/bootstrap.js', 'resources/assets/js/bootstrap.js')
	mix.copy('bower_components/pnotify/dist/pnotify.js', 'resources/assets/js/pnotify.js')
	mix.scripts([
		'jquery.js', 'bootstrap.js', 'pnotify.js', 'page.js'
	])

	mix.version(['css/app.css', 'js/all.js'])

})