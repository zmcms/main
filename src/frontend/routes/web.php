<?php
Route::middleware(['FrontendUser'])->group(function () {
	Route::get('/', function () {
		$data=[];
	    return view('themes.'.(Config('zmcms.main.theme') ?? 'zmcms').'.frontend.home.home', compact('data'));	
	});
});
