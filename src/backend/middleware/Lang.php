<?php
namespace Zmcms\Main\Backend\Middleware;
use Closure;use Session;use URL;
class Lang
{
	public function handle($request, Closure $next){
		// echo 'mdl';
		if(!Session::has('language')){
			Session::put('language', Config('zmcms.main.lang_default'));
		}
		return $next($request);
	}
}
