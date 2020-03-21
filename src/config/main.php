<?php 
return [
	/**
	 * Nazwa "tematu", pod którą składowane są pliki odpowiedzialne np. za wygląd strony internetowej.
	 * Tutaj np. w katalogu "public" będą przechowywane pliki css, itp.
	 */
	'theme' => 'zmcms', 
	
	/**
	 * Nazwa aplikacji
	 */
	'name' => 'ZMCMS',
	'backend_prefix' => 'dD34',
	/**
	 * Ustawienia językowwe aplikacji
	 */
	'lang_default'	=>	'pl',
	'lang_available'	=>	[
		'pl' =>['name' => 'polski', 'iso'=>'pl', 'flag'=>null, ],
		'en' =>['name' => 'English', 'iso'=>'en', 'flag'=>null, ],
		'es' =>['name' => 'Espaniol', 'iso'=>'es', 'flag'=>null, ],
		'de' =>['name' => 'Deutche', 'iso'=>'de', 'flag'=>null, ],
	],
	'lang_directory'=>'resources.lang',

];