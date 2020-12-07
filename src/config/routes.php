<?php
/**
 * KOLEJNOŚĆ PLIKÓW Z ROUTINGAMI SYSTEMU
 * Wszystkie routingi powinny być dostarczone przez modułe z katalogu vendor
 * Ważna jest kolejność dołączania tych plików
 */
$d = DIRECTORY_SEPARATOR;
return [
	'backend'=>[
		'zmcms'.$d.'main'.$d.'src'.$d.'backend'.$d.'routes'.$d.'web.php',
		'zmcms'.$d.'main'.$d.'src'.$d.'backend'.$d.'routes'.$d.'console.php',
		'zmcms'.$d.'users'.$d.'src'.$d.'backend'.$d.'routes'.$d.'users.php',
		'zmcms'.$d.'users'.$d.'src'.$d.'backend'.$d.'routes'.$d.'users_console.php',
		'zmcms'.$d.'website_articles'.$d.'src'.$d.'backend'.$d.'routes'.$d.'website_articles.php',
		'zmcms'.$d.'website_articles'.$d.'src'.$d.'backend'.$d.'routes'.$d.'website_articles_console.php',
		'zmcms'.$d.'website_navigations'.$d.'src'.$d.'backend'.$d.'routes'.$d.'website_navigations.php',
		'zmcms'.$d.'website_navigations'.$d.'src'.$d.'backend'.$d.'routes'.$d.'website_navigations_console.php',
	

	],
	'frontend'=>[
		'zmcms'.$d.'main'.$d.'src'.$d.'frontend'.$d.'routes'.$d.'web.php',
		'zmcms'.$d.'users'.$d.'src'.$d.'frontend'.$d.'routes'.$d.'users.php',
		'zmcms'.$d.'website_articles'.$d.'src'.$d.'frontend'.$d.'routes'.$d.'website_articles.php',
		'zmcms'.$d.'website_navigations'.$d.'src'.$d.'frontend'.$d.'routes'.$d.'website_navigations.php',

		
	],
];

