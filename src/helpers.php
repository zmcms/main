<?php
function zmcms_get_initial_head_data($theme = 'zmcms'){
	return [
		'title'		=> 'value',
		'keywords'		=> 'value',
		'description'	=> 'value',
		'canonical'		=> 'value',
		'og:title'		=> 'value',
		'og:type'		=> 'value',
		'og:url'		=> 'value',
		'og:image'		=> 'value',
		'og:description'=> 'value',
		'og:locale'		=> 'value',
		'language'		=> 'value',
		'stylesheet'	=> 'value',
		'icon'			=> 'value',
	];
}


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

function zmcms_html_css($d, $compress = false){
		$src = '';
	$js_files = array_diff(scandir($d), array('..', '.'));
	if(!$compress){
		foreach($js_files as $f)
			$src.='<script src="/'.$d.'/'.$f.'"></script>'."\n\t";
	}else{
		$sourcePath = '/path/to/source/css/file.css';
		$minifier = new MatthiasMullie\Minify\CSS();
		foreach($js_files as $f)
			$minifier->add($d.'/'.$f);
		
		$minifiedPath = 'minified.js';
		$minifier->minify($minifiedPath);
		$src.='<script src="/minified.js"></script>'."\n\t";
	}
	return $src;
}


function zmcms_html_js($d, $compress = false){
	// return $d;
	$src = '';
	$js_files = array_diff(scandir($d), array('..', '.'));
	if(!$compress){
		foreach($js_files as $f)
			$src.='<script src="/'.$d.'/'.$f.'"></script>'."\n\t";
	}else{
		$sourcePath = '/path/to/source/css/file.css';
		$minifier = new MatthiasMullie\Minify\JS();
		foreach($js_files as $f)
			$minifier->add($d.'/'.$f);
		
		$minifiedPath = 'minified.js';
		$minifier->minify($minifiedPath);
		$src.='<script src="/minified.js"></script>'."\n\t";
	}
	return $src;

}

/**
 * 
	727416244: +13,54
	519329510: +4,92
	533137611: +159,44
	
	Kamil: 110,00+13,54 = 123,54
	Grażka i Gabryś: 25,00 + 25,00 + 4,92 +21,5 = 54,92+21,5= 76,42
	Tetiana: 47,85 + 25 + 25 +159,44=97,85+159,44 = 257,29 zł
	
	Dawid: 200,00 zł.

 */




