<?php
return [
	'frontend'	=>[
		\App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \Zmcms\Main\Frontend\Middleware\Lang::class,
		// \Zmcms\Users\Frontend\Middleware\ZmcmsUsers::class,
	],
      'frontend_user_logged_in'     =>[
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \Zmcms\Main\Frontend\Middleware\Lang::class,
            \Zmcms\Users\Frontend\Middleware\ZmcmsUsers::class,
      ],
	'backend'	=>[
		\App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \Zmcms\Main\Backend\Middleware\ZmcmsMain::class,
            \Zmcms\Main\Backend\Middleware\Lang::class,
            \Zmcms\Users\Backend\Middleware\ZmcmsUsers::class,
	],

];
