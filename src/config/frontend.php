<?php
$d=DIRECTORY_SEPARATOR;
/**
 * NIE DOTYKAĆ PONIŻSZYCH DWÓCH WERSÓW
 */
if(function_exists('base_path'))
$mod_path = base_path().DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'zmcms'.DIRECTORY_SEPARATOR;

return [
	/**
	 * DOMYŚLNA BAZA DANYCH APLIKACJI
	 * W przyszłości system będzie mógł przełączać się pomiędzy lustrzanymi bazami.
	 * W przypadku awarii bazy podstawowej system automatycznie przełączy się na 
	 * bazę z klucza 'database_mirror'.
	 */
	// 'database_main'=>	'zmcms', // 
	/**
	 * ZAPASOWA BAZA DANYCH APLIKACJI
	 */
	// 'database_mirror'=>	'zmcms',
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
	'home_page_modules'	=>	[
		/********************************************************************************************
		* PRZYKŁADOWE WYWOŁANIE KLASY NA STRONIE STARTOWEJ
		* ===========================================================================================
		* [	
		* 	'Zmcms\WebsiteNavigations\Frontend\Controllers\ZmcmsWebsiteNavigationsController@home', 
		* 	[
		* 		'position'=>'start_page', 
		* 		'q'=>6, 
		* 		'view'=>'themes.zmcms.frontend.home.parts.main_offer',
		* 	],
		* ],
		* ===========================================================================================
		**/
		[
			'Zmcms\WebsiteNavigations\Frontend\Controllers\ZmcmsWebsiteNavigationsController@home', 
			[
				'position'=>'start', 
				'q'=>6, 
				'view'=>'themes.zmcms.frontend.home.parts.main_offer',
			],
		],
	],
	
];
