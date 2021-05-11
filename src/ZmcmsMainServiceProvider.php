<?php
namespace Zmcms\Main;
use Illuminate\Support\ServiceProvider;
use View;
use Config;
class ZmcmsMainServiceProvider extends ServiceProvider{

	public function register(){
		$this->app->make('Zmcms\Main\Backend\Controllers\ZmcmsMainController');
		$this->app->make('Zmcms\Main\Frontend\Controllers\ZmcmsMainController');
		require_once(__DIR__.'/helpers.php');
	}
	public function boot(){
		$mod_path = base_path().DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR;
		$this->app['router']->middlewareGroup('FrontendUser', []);
		$this->app['router']->middlewareGroup('BackendUser', []);
		
		if(Config::has(Config('zmcms.frontend.theme_name').'.middleware')){
			$m=Config(Config('zmcms.frontend.theme_name').'.middleware.frontend');
			foreach($m as $n)$this->app['router']->pushMiddlewareToGroup('FrontendUser', $n);
			$m=Config(Config('zmcms.frontend.theme_name').'.middleware.backend');
			foreach($m as $n)$this->app['router']->pushMiddlewareToGroup('BackendUser', $n);
		}
		// Ładowanie routiongów backendu
		if(is_array(Config(Config('zmcms.frontend.theme_name').'.routes.backend'))){
			foreach(Config(Config('zmcms.frontend.theme_name').'.routes.backend') as $r){
					$this->loadRoutesFrom($mod_path.$r);
			}
		}
		// Ładowanie routiongów frontendu
		if(is_array(Config(Config('zmcms.frontend.theme_name').'.routes.frontend'))){
			foreach(Config(Config('zmcms.frontend.theme_name').'.routes.frontend') as $r){
				$this->loadRoutesFrom($mod_path.$r);
			}	
		}
		
		// $this->loadRoutesFrom(__DIR__.DIRECTORY_SEPARATOR.'backend'.DIRECTORY_SEPARATOR.'routes'.DIRECTORY_SEPARATOR.'web.php');
		// $this->loadRoutesFrom(__DIR__.DIRECTORY_SEPARATOR.'backend'.DIRECTORY_SEPARATOR.'routes'.DIRECTORY_SEPARATOR.'console.php');
		// $this->loadRoutesFrom(__DIR__.DIRECTORY_SEPARATOR.'frontend'.DIRECTORY_SEPARATOR.'routes'.DIRECTORY_SEPARATOR.'web.php');

		$this->loadMigrationsFrom(__DIR__.'/migrations');

		/**
		 * ROZPAKOWYWANIE ZIPÓW PRZED PUBLIKACJĄ
		 */
		if(is_file(__DIR__.'/backend/js/filemanager.zip')){
			$zip = new \ZipArchive;
			$res = $zip->open(__DIR__.'/backend/js/filemanager.zip');
			if ($res === TRUE) {
			    $zip->extractTo(__DIR__.'/backend/js/filemanager/');
			    $zip->close();
			}
			unlink(__DIR__.'/backend/js/filemanager.zip');
			unset($zip);			
		}
		if(is_file(__DIR__.'/backend/js/tinymce.zip')){
			$zip = new \ZipArchive;
			$res = $zip->open(__DIR__.'/backend/js/tinymce.zip');
			if ($res === TRUE) {
			    $zip->extractTo(__DIR__.'/backend/js/tinymce/');
			    $zip->close();
			}
			unlink(__DIR__.'/backend/js/tinymce.zip');
			unset($zip);
		}
		$this->publishes([
			__DIR__.'/lang' => base_path('config/zmcms/lang'),
			__DIR__.'/backend/views' => base_path('resources/views/themes/zmcms/backend'),
			__DIR__.'/frontend/views' => base_path('resources/views/themes/zmcms/frontend'),
			__DIR__.'/config' => base_path('config/zmcms'),
			__DIR__.'/backend/css' => base_path('public/themes/zmcms/backend/css'),
			__DIR__.'/frontend/css' => base_path('public/themes/zmcms/frontend/css'),
			__DIR__.'/backend/js' => base_path('public/themes/zmcms/backend/js'),
			__DIR__.'/frontend/js' => base_path('public/themes/zmcms/frontend/js'),
			__DIR__.'/media' => base_path('public/themes/zmcms/media'),
		]);

		View::addLocation(__DIR__.DIRECTORY_SEPARATOR.'/backend/views');
		View::addLocation(__DIR__.DIRECTORY_SEPARATOR.'/frontend/views');
	}

}
