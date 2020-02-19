<?php
return [
	'frontend'	=>[
		\Illuminate\Session\Middleware\StartSession::class,
		\App\Http\Middleware\EncryptCookies::class,
		\App\Http\Middleware\VerifyCsrfToken::class,
	],
	'backend'	=>[
		\Illuminate\Session\Middleware\StartSession::class,
		\App\Http\Middleware\EncryptCookies::class,
		\App\Http\Middleware\VerifyCsrfToken::class,
	],
];