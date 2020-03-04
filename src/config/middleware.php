<?php
return [
	'frontend'	=>[
		\Illuminate\Session\Middleware\StartSession::class,
		\App\Http\Middleware\EncryptCookies::class,
		\App\Http\Middleware\VerifyCsrfToken::class,
		\Zmcms\Users\Frontend\Middleware\ZmcmsUsers::class,
	],
	'backend'	=>[
		\Illuminate\Session\Middleware\StartSession::class,
		\App\Http\Middleware\EncryptCookies::class,
		\App\Http\Middleware\VerifyCsrfToken::class,
		\Zmcms\Users\Backend\Middleware\ZmcmsUsers::class,
	],
];