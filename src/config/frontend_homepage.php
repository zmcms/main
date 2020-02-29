<?php
return [
	/**
	 * Tutaj mamy zestaw helperów, które zbiorą z bazy 
	 * potrzebne dane do wygenerowania informacji na stronę startową 
	 */
	'data_getters'=>[
		'head'=>[
			zmcms_get_initial_head_data($theme = 'zmcms'),
		],
		'nav'=>[
			'main'=>[
				zmcms_website_navigations_frontend($position = 'main', $parent = null),
			],
			'footer'=>[
				zmcms_website_navigations_frontend($position = 'footer', $parent = null),
			],
			'left'=>[
				zmcms_website_navigations_frontend($position = 'main', $parent = null)
			],
			'right'=>[
				zmcms_website_navigations_frontend($position = 'right', $parent = null),
			],
		],
	],
];














