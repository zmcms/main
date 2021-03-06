<?php
// echo 'offer<br />';
$prefix = Config('zmcms.main.backend_prefix');
Route::middleware(['BackendUser'])->group(function () use ($prefix){
	Route::get($prefix.'/home', 'Zmcms\Main\Backend\Controllers\ZmcmsMainController@zmcms_main_home')->name('backend_home');
	Route::get($prefix.'/home/settings/contact_data', 'Zmcms\Main\Backend\Controllers\ZmcmsMainController@settings_contact_data')->name('settings_contact_data');
	Route::post($prefix.'/zmcms_main_frm_contact_data_update', 'Zmcms\Main\Backend\Controllers\ZmcmsMainController@zmcms_main_frm_contact_data_update')->name('settings_contact_data');
	Route::get($prefix.'/zmcms_main_frm_contact_data_delete_department/{dptkey}', 'Zmcms\Main\Backend\Controllers\ZmcmsMainController@zmcms_main_frm_contact_data_delete_department')->name('settings_contact_data');
	Route::get($prefix.'/contact_data_create_new_department', 'Zmcms\Main\Backend\Controllers\ZmcmsMainController@contact_data_create_new_department')->name('settings_contact_data');
	Route::post($prefix.'/contact_data_create_new_department_save', 'Zmcms\Main\Backend\Controllers\ZmcmsMainController@contact_data_create_new_department_save')->name('settings_contact_data');
	
	Route::get($prefix.'/home/settings/cookies_info', 'Zmcms\Main\Backend\Controllers\ZmcmsMainController@settings_cookies_info')->name('settings_cookies_info');
	Route::post($prefix.'/zmcms_main_frm_cookies_info_update', 'Zmcms\Main\Backend\Controllers\ZmcmsMainController@zmcms_main_frm_cookies_info_update')->name('settings_cookies_info');
	Route::get($prefix.'/home/settings/logo', 'Zmcms\Main\Backend\Controllers\ZmcmsMainController@settings_logo')->name('settings_logo');
	Route::post($prefix.'/zmcms_main_frm_logo_update', 'Zmcms\Main\Backend\Controllers\ZmcmsMainController@zmcms_main_frm_logo_update')->name('settings_logo');
	Route::post($prefix.'/zmcms_main_set_logo_img', 'Zmcms\Main\Backend\Controllers\ZmcmsMainController@zmcms_main_set_logo_img')->name('settings_logo');
	Route::get($prefix.'/home/settings/seo_sem_frm', 'Zmcms\Main\Backend\Controllers\ZmcmsMainController@seosem_default_frm')->name('seosem_default');
	Route::post($prefix.'/zmcms_main_seo_sem_frm_update', 'Zmcms\Main\Backend\Controllers\ZmcmsMainController@zmcms_main_seo_sem_frm_update')->name('seosem_default');
	Route::get($prefix.'/home/settings/website_themes_frm', 
		'Zmcms\Main\Backend\Controllers\ZmcmsMainController@website_themes_frm')
		->name('website_themes');
	Route::get($prefix.'/home/settings/zmcms_main_new_theme_create/{new_theme_name?}', 
		'Zmcms\Main\Backend\Controllers\ZmcmsMainController@zmcms_main_new_theme_create')
		->name('website_themes');

	Route::post($prefix.'/db/sort',
		'Zmcms\Main\Backend\Controllers\ZmcmsMainController@db_sort')
		->name('db');
	Route::post($prefix.'/db/filter',
		'Zmcms\Main\Backend\Controllers\ZmcmsMainController@db_filter')
		->name('db');
	Route::post($prefix.'/db/sort_delete',
		'Zmcms\Main\Backend\Controllers\ZmcmsMainController@sort_delete')
		->name('db');
	Route::get($prefix.'/main/rwd_image_src',
		'Zmcms\Main\Backend\Controllers\ZmcmsMainController@rwd_image_src')
		->name('editor');
	Route::post($prefix.'/main/rwd_image_src_process',
		'Zmcms\Main\Backend\Controllers\ZmcmsMainController@rwd_image_src_process')
		->name('editor');
	

});
