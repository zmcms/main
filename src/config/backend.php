<?php
$dirsep=DIRECTORY_SEPARATOR;
$mod_path = base_path().DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'zmcms'.DIRECTORY_SEPARATOR;
return [
	'bankend_home_panel_views'	=>	[
		$mod_path.'website_articles'.$dirsep.'src'.$dirsep.'backend'.$dirsep.'views'.$dirsep.'home_subview.blade.php',
		$mod_path.'website_navigations'.$dirsep.'src'.$dirsep.'backend'.$dirsep.'views'.$dirsep.'home_subview.blade.php',
		$mod_path.'users'.$dirsep.'src'.$dirsep.'backend'.$dirsep.'views'.$dirsep.'home_subview.blade.php',
		$mod_path.'main'.$dirsep.'src'.$dirsep.'backend'.$dirsep.'views'.$dirsep.'home_subview.blade.php',
	],
	'default_row_count'			=>	20,
];