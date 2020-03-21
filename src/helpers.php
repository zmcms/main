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
/**
 * Ta funkcja pomaga utworzyć lub odczytać plik konfiguracyjny w aplikacji Laravel
 */
function zmcms_config_file($config_name, $arr=[]){
	$conf_arr=[];
	$d=DIRECTORY_SEPARATOR;
	$config_path = base_path().$d.'config'.$d.Config('zmcms.frontend.theme_name').$d.$config_name.'.php';
	$txt =  "<?php\n"
			.'/**'."\n"
			.'* Ten plik został utworzony automatycznie.'."\n"
			.'* Jeżeli wiesz, co robisz, możesz edytować samodzielnie ten plik, '."\n"
			.'* jednak zalecamy mocno użycie formularza do aktualizacji tych danych w systemie'."\n"
			.'* Odpowiednie opcje znajdziesz w sekcji "Ustawienia"'."\n"
			.'**/'."\n";
	if(is_array(Config(Config('zmcms.frontend.theme_name').'.'.$config_name))){
		$conf_arr = Config(Config('zmcms.frontend.theme_name').'.'.$config_name);
			if($arr==[]) return $conf_arr; //Zwracam tylko istniejący config, bo $arr==[].
		foreach ($arr as $key => $value) { //Zmienna $arr!=[], więc aktualizuję config
			$conf_arr[$key] = $value;
		}
	}else{
		$conf_arr = $arr; // Gdy nie ma nadanego pliku konfiguracyjnego, to ustawiam to, co jest w zmiennej $arr
	}
	$txt .= "\nreturn ". var_export($conf_arr, true) .";";
	$myfile = fopen($config_path, "w"); //Aktualizuję plik konfiguracyjny
	fwrite($myfile, $txt);
	fclose($myfile);
	return $conf_arr;
	
}

function zmcms_html_css($d, $compress = false){
		$src = '';
	$js_files = array_diff(scandir($d), array('..', '.', '*.zip'));
	if(!$compress){
		foreach($js_files as $f)
			$f=str_replace('.zip', '', $f);
			$src.='<link rel="stylesheet" type="text/css" href="/'.$d.'/'.$f.'">'."\n\t";
	}else{
		$sourcePath = '/path/to/source/css/file.css';
		$minifier = new MatthiasMullie\Minify\CSS();
		foreach($js_files as $f)
			$minifier->add($d.'/'.$f);
		
		$minifiedPath = 'minified.css';
		$minifier->minify($minifiedPath);
		$src.='<link rel="stylesheet" type="text/css" href="/minified.css">';
		// $src.='<script src=""></script>'."\n\t";
	}
	return $src;
}


function zmcms_html_js($d, $compress = false){
	// return $d;
	$src = '';
	$js_files = array_diff(scandir($d), array('..', '.', '*.zip'));
	if(!$compress){
		foreach($js_files as $f){
			$f=str_replace('.zip', '', $f);
			if(is_file($d.'/'.$f))
				$src.='<script src="/'.$d.'/'.$f.'"></script>'."\n\t";
		}
	}else{
		$sourcePath = '/path/to/source/css/file.css';
		$minifier = new MatthiasMullie\Minify\JS();
		foreach($js_files as $f){
			if(is_file($d.'/'.$f))
				$minifier->add($d.'/'.$f);
		}
		
		$minifiedPath = 'minified.js';
		$minifier->minify($minifiedPath);
		$src.='<script src="/minified.js"></script>'."\n\t";
	}
	return $src;

}

/**
 * FUNKCJA USTAWIA LUB ZWRACA BIEŻĄCY JĘZYK W SYSTEMIE ZMCMS
 */
function language($lang = null){
	if($lang == null)	return Session::get('language');
	Session::put('language', $lang);
	return $lang;
}
/**
 * Własna funkcja do obsługi tłumaczeń w ramach pakietów z rodziny ZMCMS
 * $key    - to string podlegający tłumaczeniu
 * $lang   - Opcjonalnie. Ustawiamy tu język, na jaki tłumaczymy $key. 
 *           Gdy null, bierzemy pod uwagę aktualnie ustawiony język aplikacji
 * $dir    - Opcjonalnie. Katalog, w któym zlokalizowane są pliki z tłumaczeniem. 
 *           Ścieżka względna w stosunku do katalogu aplikacji.
 *           Gdy null, następuje próba pobrania tłumaczenia z domyślnych katalogów Laravela
 * $format - Opcjonalnie. Formaty: json, php, db.
 *           json - plik o nazwie en.json, es.json itp.
 *           php - plik o nazwie en.php, es.php itp,
 *           db - tłumaczenie pobierane jest z bazy danych
 */
function ___($key, $lang = null, $dir = null, $format = 'json'){
	return 'przeciążenie';
}
