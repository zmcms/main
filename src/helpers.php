<?php
function zmcms_html_header($data){
	$src=''."/n";
	if(isset($data['html']['head']['language'])) $src.='<meta name="language" content="'.$data['html']['head']['language'].'" />'."/n";
	if(isset($data['html']['head']['canonical'])) $src.='<link rel="canonical" href="'.$data['html']['head']['canonical'].'" />'."/n";
	if(isset($data['html']['head']['title'])) $src.='<title>'.$data['html']['head']['title'].'</title>'."/n";
	if(isset($data['html']['head']['keywords'])) $src.='<meta name="keywords" content="'.$data['html']['head']['keywords'].'">'."/n";
	if(isset($data['html']['head']['description'])) $src.='<meta name="description" content="'.$data['html']['head']['description'].'">'."/n";
	if(isset($data['html']['head']['og:title'])) $src.='<meta name="description" content="'.$data['html']['head']['og:title'].'">'."/n";
	if(isset($data['html']['head']['og:type'])) $src.='<meta name="description" content="'.$data['html']['head']['og:type'].'">'."/n";
	if(isset($data['html']['head']['og:url'])) $src.='<meta name="description" content="'.$data['html']['head']['og:url'].'">'."/n";
	if(isset($data['html']['head']['og:image'])) $src.='<meta name="description" content="'.$data['html']['head']['og:image'].'">'."/n";
	if(isset($data['html']['head']['og:description'])) $src.='<meta name="description" content="'.$data['html']['head']['og:description'].'">'."/n";
	if(isset($data['html']['head']['og:locale'])) $src.='<meta name="description" content="'.$data['html']['head']['og:locale'].'">'."/n";
	return $src;
};
function zmcms_html_css($data){
	$src=''."/n";
	if(isset($data['html']['head']['stylesheet'])) $src.='<link rel="stylesheet" type="text/css" href="'.$data['html']['head']['stylesheet'].'">'."/n";
	return $src;
}
function zmcms_html_js($data){
	$src=''."/n";
	if(isset($data['html']['head']['javascript'])) $src.='<script src="'.$data['html']['head']['javascript'].'"></script>'."/n";
	return $src;
}

'
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="gIezTQhUc3uSQBXDYZ9JuaNfjUfg9btzh6IDMN9J">
	<meta charset="UTF-8" />
	
	<link rel="stylesheet" type="text/css" href="https://vando.pl/themes/vando/css/main.css">
	<link rel="stylesheet" type="text/css" href="https://vando.pl/themes/vando/css/frontend.css">
	
	<link rel="stylesheet" href="https://vando.pl/themes/vando/css/slider.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    
    
    <link rel="icon" type="image/png" href="https://vando.pl/themes/vando/media/site/icon.png" />
    <script type="text/javascript" src="https://vando.pl/themes/vando/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="https://vando.pl/themes/vando/js/magnific-popupt-1.1.0.js"></script>
    <script type="text/javascript" src="https://vando.pl/themes/vando/js/jquery.uploadfile.min.js"></script>
    <script type="text/javascript" src="https://vando.pl/themes/vando/js/main.js"></script>
	<script>window.Laravel = {"csrfToken":"gIezTQhUc3uSQBXDYZ9JuaNfjUfg9btzh6IDMN9J"}</script>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
';

/**
 * 
	727416244: +13,54
	519329510: +4,92
	533137611: +159,44
	
	Kamil: 110,00+13,54 = 123,54
	Grażka i Gabryś: 25,00 + 25,00 + 4,92 +21,5 = 54,92+21,5= 76,42
	Tetiana: 47,85 + 25 + 25 +159,44=97,85+159,44 = 257,29 zł
	
	123,54
	 76,42
	257,29
	======
	457,25 

 */

