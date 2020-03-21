<?php
$d=DIRECTORY_SEPARATOR;
$mod_path = base_path().DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'zmcms'.DIRECTORY_SEPARATOR;
return [
	'database_default'=>	'zmcms',
	/**
	 * Poniżej nazwa "tematu", "skórki" itp.
	 */
	'theme_name'=>			'zmcms',
	/**
	 * Tablica, na podstawie której budujemy strukturę strony startowej,
	 * pobieramy dane, generujemy widoki itp.
	 * Najlepiej przyjąć jakąś konwencję nazewnictwa tych helperów, 
	 * np.: zmcms_main_cośtam, zmcms_website_navigations_cotamkolejnego itp., 
	 * czyli wiemy, jaki jest vendor/pakiet.
	 * Kolumna 1 to nazwa funkcji - helpera
	 * Druga kolumna to tablica parametrów wywołaniafunkcji
	 */
	'frontent_home_page_modules'	=>	[
		['nazwa_helpera_1',		['par1'=>'val1','par2'=>'val2','par3'=>'val1',]],
		['nazwa_helpera_2',		['par1'=>'val1','par2'=>'val2','par3'=>'val1',]],
		/** .... **/
		['nazwa_helpera_N',		['par1'=>'val1','par2'=>'val2','par3'=>'val1',]],
	],
];