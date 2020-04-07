<?php
namespace Zmcms\Main\Backend\Middleware;
use Closure;use Session;use URL;
class ZmcmsMain
{
	public function handle($request, Closure $next){
		// echo 'mdl';
		if(!Session::has('row_count'))Session::put('row_count', Config('zmcms.backend.default_row_count'));
		return $next($request);
	}
}
