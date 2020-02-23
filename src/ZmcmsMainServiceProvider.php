<?php
namespace Zmcms\Main;
use Illuminate\Support\ServiceProvider;
use View;
class ZmcmsMainServiceProvider extends ServiceProvider{

	public function register(){
		$this->app->make('Zmcms\Main\Backend\Controllers\ZmcmsMainController');
		$this->app->make('Zmcms\Main\Frontend\Controllers\ZmcmsMainController');
		require_once(__DIR__.'/helpers.php');
	}

	public function boot(){
		$this->app['router']->middlewareGroup('FrontendUser', []);
		$this->app['router']->middlewareGroup('BackendUser', []);
		if(Config::has('zmcms.middleware)){
			$m=Config('zmcms.middleware.frontend');
			foreach($m as $n)$this->app['router']->pushMiddlewareToGroup('FrontendUser', $n);
			$m=Config('zmcms.middleware.backend');
			foreach($m as $n)$this->app['router']->pushMiddlewareToGroup('BackendUser', $n);
		}
		$this->app['router']->pushMiddlewareToGroup('BackendUser', $n);

		$this->loadRoutesFrom(__DIR__.DIRECTORY_SEPARATOR.'backend\routes'.DIRECTORY_SEPARATOR.'web.php');
		$this->loadRoutesFrom(__DIR__.DIRECTORY_SEPARATOR.'backend\routes'.DIRECTORY_SEPARATOR.'console.php');
		$this->loadRoutesFrom(__DIR__.DIRECTORY_SEPARATOR.'frontend\routes'.DIRECTORY_SEPARATOR.'web.php');
		$this->loadMigrationsFrom(__DIR__.'/migrations');
		$this->publishes([
			__DIR__.'/backend/views' => base_path('resources/views/themes/zmcms/backend'),
			__DIR__.'/frontend/views' => base_path('resources/views/themes/zmcms/frontend'),
			__DIR__.'/config' => base_path('config/zmcms'),
			__DIR__.'/backend/css' => base_path('public/themes/zmcms/backend/css'),
			__DIR__.'/frontend/css' => base_path('public/themes/zmcms/frontend/css'),
			__DIR__.'/backend/js' => base_path('public/themes/zmcms/backend/js'),
			__DIR__.'/frontend/js' => base_path('public/themes/zmcms/frontend/js'),
		]);
		View::addLocation(__DIR__.DIRECTORY_SEPARATOR.'/backend/views');
		View::addLocation(__DIR__.DIRECTORY_SEPARATOR.'/frontend/views');
	}

}
