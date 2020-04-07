<?php
namespace Zmcms\Main\Frontend\Controllers;
use Illuminate\Http\Request;
class ZmcmsMainController extends \App\Http\Controllers\Controller
{
	public function homepage($parameters = null, Request $request = null){
		$str =''; $data = [];
		$arr = Config((Config('zmcms.frontend.theme_name')?? 'zmcms').'.frontend.home_page_modules');
		foreach ($arr as $a) {
			$str .= \App::call(
				$a[0],
				$a[1]
			);
		}

		// return 'xxxxxxxxxxxxxxxxxxxx<br />'.print_r($arr, true);
		return view('themes.'.(Config('zmcms.frontend.theme_name') ?? 'zmcms').'.frontend.home.home', compact('data', 'str'));
		// return __METHOD__;
	}
}
