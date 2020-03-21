<?php
namespace Zmcms\Main\Frontend\Controllers;
use Illuminate\Http\Request;
class ZmcmsMainController extends \App\Http\Controllers\Controller
{
	public function homepage($parameters = null, Request $request = null){
		return view('themes.'.(Config('zmcms.main.theme') ?? 'zmcms').'.frontend.home.home', compact('data'));
		return __METHOD__;
	}
}
