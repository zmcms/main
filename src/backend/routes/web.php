<?php
Route::middleware(['BackendUser'])->group(function () {
	Route::any('sss', function(){return 'xxxx';});
});
