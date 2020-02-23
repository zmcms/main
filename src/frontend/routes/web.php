<?php
Route::middleware(['FrontendUser'])->group(function () {
	Route::get('/', function () {
	    return 'blablabla';	
	});
});
