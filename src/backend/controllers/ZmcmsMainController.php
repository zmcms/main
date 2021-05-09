<?php
namespace Zmcms\Main\Backend\Controllers;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Session;
use Illuminate\Support\Facades\DB;
class ZmcmsMainController extends \App\Http\Controllers\Controller
{	
	private $txt =  "<?php\n"
			.'/**'."\n"
			.'* Ten plik został utworzony automatycznie.'."\n"
			.'* Jeżeli wiesz, co robisz, możesz edytować samodzielnie ten plik, '."\n"
			.'* jednak zalecamy mocno użycie formularza do aktualizacji tych danych w systemie'."\n"
			.'* Odpowiednie opcje znajdziesz w sekcji "Ustawienia"'."\n"
			.'**/'."\n";
	public function zmcms_main_home(){		
		$af_api=[
			'a'=>'b',
		];
		$client = new \Aftermarketpl\Api\Client(array(
    		"key" => "d4etc5ntsu6xyq4z6ziu2q1bjhmynxhe",
    		"secret" => "0ymiabdwsom5dmzj7s4dbsgo6zmh3k0g",
		));
		$af_api = [
			'balance'=>print_r($client->send("/account/balance"), true), 
			'currency'=>print_r($client->send("/account/currency"), true), 
			'id'=>print_r($client->send("/account/id"), true), 
			'login'=>print_r($client->send("/account/login"), true), 
			'contact_list'=>print_r($client->send("/contact/list"), true), 
			'domain_check_free'=>print_r($client->send("/domain/check", ['names'=>'domenajaksa.pl']), true), 
			'domain_check_not_free'=>print_r($client->send("/domain/check", ['names'=>'co-it.pl']), true), 
			'contact_get'=>print_r($client->send("/contact/get", ['contactId'=>'162765']), true), 
			'contact_domain_list'=>print_r($client->send("/contact/domain/list", ['contactId'=>'162765']), true), 
			
			
			
		];
		return view('themes.'.Config('zmcms.frontend.theme_name').'.backend.home', compact('af_api'));
		/**
		 * 
	/account/balance
	/account/currency
	/account/id
	/account/login
	/auction/bid/list
		 */
	}

	/**
	 * EDYCJA PLIKU KOFIGURACYJNEGO "contact_data.php"
	 * zawierającego podstawowe dane kontaktowe
	 */
	public function settings_contact_data(){
		if(is_array(Config(Config('zmcms.frontend.theme_name').'.contact_data'))){
			$data= Config(Config('zmcms.frontend.theme_name').'.contact_data');
		}else{
			$d=DIRECTORY_SEPARATOR;
			$config_path = base_path().$d.'config'.$d.Config('zmcms.frontend.theme_name').$d.'contact_data.php';
			$txt =$this->txt;
			$txt .= "\nreturn ". var_export(['headquarters'=>[], 'departments'=>[], ], true) .";";
			$myfile = fopen($config_path, "w");
			fwrite($myfile, $txt);
			fclose($myfile);
			$data = [];
		}
		return view('themes.'.Config('zmcms.frontend.theme_name').'.backend.zmcms_main_settings_contact_data', compact('data'));
	}


	public function zmcms_main_frm_contact_data_update(Request $request){
		$d=DIRECTORY_SEPARATOR;
		$config_path = base_path().$d.'config'.$d.Config('zmcms.frontend.theme_name').$d.'contact_data.php';
		$data = $request->all();
		unset($data['_token']);
		$txt =$this->txt;
		$txt .= "\nreturn ". var_export($data, true) .";";
			$myfile = fopen($config_path, "w");
			fwrite($myfile, $txt);
			fclose($myfile);
			$data = [];
		return 'ok';
	}

	
	public function settings_cookies_info(){
		if(is_array(Config(Config('zmcms.frontend.theme_name').'.cookies_info'))){
			$data= Config(Config('zmcms.frontend.theme_name').'.cookies_info');
		}else{
			$d=DIRECTORY_SEPARATOR;
			$config_path = base_path().$d.'config'.$d.Config('zmcms.frontend.theme_name').$d.'cookies_info.php';
			$txt =$this->txt;
			$txt .= "\nreturn ". var_export(['duration'=>(3600*24*7*4), 'title'=>null, 'link'=>null, 'content'=>null, ], true) .";";
			$myfile = fopen($config_path, "w");
			fwrite($myfile, $txt);
			fclose($myfile);
			$data = [];
		}
		return view('themes.'.Config('zmcms.frontend.theme_name').'.backend.zmcms_main_settings_cookies_info', compact('data'));
	}
	public function zmcms_main_frm_cookies_info_update(Request $request){
		$d=DIRECTORY_SEPARATOR;
		$config_path = base_path().$d.'config'.$d.Config('zmcms.frontend.theme_name').$d.'cookies_info.php';
		$data = $request->all();
		unset($data['_token']);
		$txt =$this->txt;
		$txt .= "\nreturn ". var_export($data, true) .";";
			$myfile = fopen($config_path, "w");
			fwrite($myfile, $txt);
			fclose($myfile);
			$data = [];
		return 'ok';
	}
	public function settings_logo(){
		if(is_array(Config(Config('zmcms.frontend.theme_name').'.media'))){
			$data= Config(Config('zmcms.frontend.theme_name').'.media');
		}else{
			$default_array = [
				'folder'=>'/themes/'.Config('zmcms.frontend.theme_name').'/media/', 
				'logo'=>'/themes/'.Config('zmcms.frontend.theme_name').'/media/site/logo.png', 
				'icon'=>'/themes/'.Config('zmcms.frontend.theme_name').'/media/site/icon.png', 
				'img'=>[
					'sizes'=>[15, 30, 100, 200, 300, 600, 800, 1024, 1400, 1980, ],
					'types'=>[],
					'folder'=>'/themes/'.Config('zmcms.frontend.theme_name').'/media/img/', 
				], 
			];
			zmcms_config_file('media', $default_array);
		}
		
		return view('themes.'.Config('zmcms.frontend.theme_name').'.backend.zmcms_main_settings_logo', compact('data'));
	}
	public function zmcms_main_frm_logo_update(Request $request){
		$data = $request->all();
		$config_media = Config('zmcms.media');
		if(strlen($data['logo'])!=0){

			$data['logo']=base_path().'/public/themes/'.Config('zmcms.frontend.theme_name').'/media/'.$data['logo'];
			$target = Config(Config('zmcms.frontend.theme_name').'.media.logo');

			$image = Image::make($data['logo'])->resize($data['logo_width'], null, function ($constraint) {
    			$constraint->aspectRatio();
			});
			$tst = base_path().'/public/'.$config_media['logo'];
			if(!file_exists($tst)){
				@mkdir($tst, 0777, true);
			}
			@rmdir($tst);
			// if(file_exists(base_path().'/public/'.$config_media['logo'])) unlink(base_path().'/public/'.$config_media['logo']));
			$image->save(base_path().'/public/themes/'.Config('zmcms.frontend.theme_name').'/media/site/logo.png', 80);
			$config_media['logo'] = 'themes/'.Config('zmcms.frontend.theme_name').'/media/site/logo.png';
		}
		if(strlen($data['favicon'])!=0){

			$data['favicon']=base_path().'/public/themes/'.Config('zmcms.frontend.theme_name').'/media/'.$data['favicon'];
			$target = Config(Config('zmcms.frontend.theme_name').'.media.icon');

			$image = Image::make($data['favicon'])->resize($data['favicon_width'], null, function ($constraint) {
    			$constraint->aspectRatio();
			});
			$tst = base_path().'/public/'.$config_media['icon'];
			if(!file_exists($tst)){
				@mkdir($tst, 0777, true);
			}
			@rmdir($tst);
			// if(file_exists(base_path().'/public/'.$config_media['icon'])) unlink(base_path().'/public/'.$config_media['icon']));
			$image->save(base_path().'/public/themes/'.Config('zmcms.frontend.theme_name').'/media/site/icon.png', 80);
			$config_media['icon'] = 'themes/'.Config('zmcms.frontend.theme_name').'/media/site/icon.png';
			
		}
		zmcms_config_file('media', $config_media);

		return 'ok';
	}
	public function zmcms_main_set_logo_img(Request $request){
		return zmcms_config_file('media', []);
		$d=DIRECTORY_SEPARATOR;
		$config_path = base_path().$d.'config'.$d.Config('zmcms.frontend.theme_name').$d.'media.php';
		$path=base_path().'/public/themes/'.Config('zmcms.frontend.theme_name').'/media/';
		$image = Image::make($path.$request->all()['logo'])->resize(300, null, function ($constraint) {
    			$constraint->aspectRatio();
		});
		$txt =$this->txt;
		$config_media = Config(
			Config('zmcms.frontend.theme_name').'.media'
		);
		Config('zmcms.media');
		$txt .= "\nreturn ". var_export($data, true) .";";
		$image->save(base_path().'/public/'.$config_media['logo'], 80);
		return 'ok';
	}
	public function seosem_default_frm(){
		if(is_array(Config(Config('zmcms.frontend.theme_name').'.seosem'))){
			$data= Config(Config('zmcms.frontend.theme_name').'.seosem');
		}else{
			$default_array = [
				'head'=>[
					'title' => null,
					'keywords' => null,
					'description' => null,
					'language' => null,
					'author' => null,
					'viewport' => null,
					'refresh' => null,
					'lang' => null,
					'referrer' => null,
					'robots' => null,
					'googlebot' => null,
					'google-site-verification' => null,
				],
				'og'=>[
					'title' => null,
					'type' => null,
					'url' => null,
					'description' => null,
					'image' =>[
						'image' => null,
						'secure_url' => null,
						'format' => null,
						'width' => null,
						'height' => null,
						'alt' => null,
					]
				],
			];
			$data = zmcms_config_file('seosem', $default_array);
		}
		return view('themes.'.Config('zmcms.frontend.theme_name').'.backend.zmcms_main_settings_seosem', compact('data'));
	}
	public function zmcms_main_seo_sem_frm_update(Request $request){
		$data=$request->all();
		if(is_array(Config(Config('zmcms.frontend.theme_name').'.seosem'))){
			$config_data= Config(Config('zmcms.frontend.theme_name').'.seosem');
		}else{
			$config_data=[];
		}
		if($data['og']['image']!=''){
			$file['og_img']=base_path().'/public'.Config(Config('zmcms.frontend.theme_name').'.media.folder').$data['og']['image'];
			$target = base_path().'/public'.Config(Config('zmcms.frontend.theme_name').'.media.folder').'site/og_img.jpg';
			$target2=Config(Config('zmcms.frontend.theme_name').'.media.folder').'site/og_img.jpg';
			$image = Image::make($file['og_img'])->resize($data['og']['image:width'], null, function ($constraint) {
    			$constraint->aspectRatio();
			});
			if(!file_exists($target)){
				@mkdir($target, 0777, true);
			}
			@rmdir($target);
			$image->save($target, 80);
		}else{
			$target=null;
		}
		
		unset($data['_token']);
		$config_data['head']['title']=$data['head']['title'];
		$config_data['head']['keywords']=$data['head']['keywords'];
		$config_data['head']['description']=$data['head']['description'];
		$config_data['head']['language']=$data['head']['language'];
		$config_data['head']['author']=$data['head']['author'];
		// $config_data['head']['viewport']=$data['head']['viewport'];
		$config_data['head']['refresh']=$data['head']['refresh'];
		// $config_data['head']['lang']=$data['head']['lang'];
		// $config_data['head']['referrer']=$data['head']['referrer'];
		$config_data['head']['robots']=$data['head']['robots'];
		// $config_data['head']['googlebot']=$data['head']['googlebot'];
		$config_data['head']['google-site-verification']=$data['head']['google-site-verification'];

		$config_data['og']['title']=$data['og']['title'];
		$config_data['og']['type']=$data['og']['type'];
		$config_data['og']['url']=$data['og']['url'];
		$config_data['og']['description']=$data['og']['description'];
		if(strlen($data['og']['image'])>0)$config_data['og']['image']['image']=$target2;
		$config_data['og']['image']['height']=$data['og']['image:height'];
		$config_data['og']['image']['width']=$data['og']['image:width'];
		$config_data['og']['image']['format']=$data['og']['image:format'];
		$config_data['og']['image']['alt']=$data['og']['image:alt'];

		$txt =$this->txt;
		$txt .= "\nreturn ". var_export($config_data, true) .";";
		zmcms_config_file('seosem', $config_data);
		return 'ok';
	}
	/**
	 * Usuwanie lokalizacji firmy z pliku konfiguracyjnego contact_data.php
	 */
	public function zmcms_main_frm_contact_data_delete_department($dptkey){
		$data= Config(Config('zmcms.frontend.theme_name').'.contact_data');

		if(!is_array($data)) return 'Błąd w pliku konfiguracyjnym';
		unset($data['departments'][$dptkey]);
		$arr = [];
		foreach($data['departments'] as $v)
			$arr[] = $v;
		$data['departments'] = $arr;
		zmcms_config_file('contact_data', $data);
		return 'ok';
	}
	/**
	 * OTWIERA FORMULARZ DLA NOWEJ LOKALIZACJI DO PLIKU konfiguracyjnego contact_data.php
	 */
	public function contact_data_create_new_department(){
		$data=[];
		return view('themes.'.Config('zmcms.frontend.theme_name').'.backend.zmcms_main_settings_contact_data_new_department', compact('data'));
	}
	/**
	 * DODAJE KOLEJNĄ LOKALIZACJĘ DO PLIKU konfiguracyjnego contact_data.php
	 */
	public function contact_data_create_new_department_save(Request $request){
		$data = $request->all();
		$config_data= Config(Config('zmcms.frontend.theme_name').'.contact_data');
		if(!is_array($config_data)) return 'Błąd w pliku konfiguracyjnym contact_data.php';

		if(!(isset($config_data['departments'])) || (!is_array($config_data['departments']))){
			$config_data['departments']=[];
		}
		$count = count($config_data['departments'])+1;
		$config_data['departments'][]=[
			'key' => $count,
			'localisation_name'	=> $data['departments'][1]['localisation_name'],
			'phone'				=> $data['departments'][1]['phone'],
			'mail'				=> $data['departments'][1]['mail'],
			'addr_l1'			=> $data['departments'][1]['addr_l1'],
			'addr_l2'			=> $data['departments'][1]['addr_l2'],
			'zip_code'			=> $data['departments'][1]['zip_code'],
			'locality'			=> $data['departments'][1]['locality'],
			'province'			=> $data['departments'][1]['province'],
			'country'			=> $data['departments'][1]['country'],
			'countryID'			=> $data['departments'][1]['countryID'],
		];
		zmcms_config_file('contact_data', $config_data);
		return 'ok';

		return print_r($data, true);
		return 'ok';
	}
	public function website_themes_frm(){
		$data = [];
		$installed = array_diff(scandir(base_path().'/public/themes/'), array('..', '.'));
		foreach($installed as $f){
				$data[]=$f;
		}
		return view('themes.'.Config('zmcms.frontend.theme_name').'.backend.zmcms_main_themes_admin', compact('data'));
	}
	/**
	 * KOPIOWANIE PLIKÓW TWORZĄCYCH MOTYW GRAFICZNY SERWISU INTERNETOWEGO
	 */
	public function zmcms_main_new_theme_create($new_theme_name = null, $src_theme_name = null){
		ini_set('max_execution_time', '0');
		if($src_theme_name == null) $src_theme_name = Config('zmcms.frontend.theme_name');
		$new_theme_name = str_slug($new_theme_name);
		$d=DIRECTORY_SEPARATOR;
		/**
		 * GDY NIE PODANO NAZWY
		 */
		if($new_theme_name == null || $new_theme_name == '')
			return json_encode([
				'result'	=>	'error',
				'code'		=>	'cant_copy_theme_name_empty',
				'msg' 		=>	___('Nazwa nowego motywu nie może być pusta.'),
			]);
		/**
		 * GDY NAZWA ISTNIEJE
		 */
		if(file_exists(base_path().$d.'public'.$d.'themes'.$d.$new_theme_name))
			return json_encode([
				'result'	=>	'error',
				'code'		=>	'cant_copy_theme_name_exists',
				'msg' 		=>	___('Nazwa nowego motywu jest już wykorzystana.'),
			]);
		/**
		 * KOPIOWANIE
		 */
		//KATALOG PUBLIC
		\File::copyDirectory(
			base_path().$d.'public'.$d.'themes'.$d.$src_theme_name,
			base_path().$d.'public'.$d.'themes'.$d.$new_theme_name
		);
		//KATALOG Z WIDOKAMI
		\File::copyDirectory(
			base_path().$d.'resources'.$d.'views'.$d.'themes'.$d.$src_theme_name,
			base_path().$d.'resources'.$d.'views'.$d.'themes'.$d.$new_theme_name
		);
		//KATALOG Z KONFIGURACJĄ
		\File::copyDirectory(
			base_path().$d.'config'.$d.$src_theme_name,
			base_path().$d.'config'.$d.$new_theme_name
		);
		/**
		 * KOPIOWANIE SKOŃCZONE
		 */
			return json_encode([
				'result'	=>	'ok',
				'code'		=>	'ok',
				'msg' 		=>	___('Utworzono nowy motyw serwisu. Aby go aktywować, ustaw opcję w pliku "/config/zmcms/frontend.php": <br />[...]<br />\'theme_name\'=>\''.str_slug($new_theme_name).'\'<br />[...]'),
			]);
	}


	public function db_sort(Request $request){
		$data = [];
		$d = $request->all();
		if(Session::has('sorting')){
			$data = Session::get('sorting');
		}
		if(isset($data[$d['set']][$d['col']]))
			$data[$d['set']][$d['col']]=($data[$d['set']][$d['col']]=='asc')?'desc':'asc';
		else
			$data[$d['set']][$d['col']]='asc';
		Session::put('sorting', $data);
		// return '<pre>'.print_r(Session::get('sorting'), true).'</pre>';
	}

	public function sort_delete(Request $request){
		$data = [];
		$d = $request->all();
		if(Session::has('sorting'))
			$data = Session::get('sorting');
		if(isset($data[$d['set']]))
			unset($data[$d['set']]);
		Session::put('sorting', $data);
}


	public function db_filter(Request $request){
		$x = [];
		$d = $request->all();
		$x[$d['set']] = $d['txt_filter']; 
		Session::put('db_filters', $x);
		// return '<pre color="fff">'.print_r(Session::get('db_filters'), true).'</pre>';
		// return '<pre color="fff">'.print_r(Session::get('db_filters'), true).'</pre>';
	}
	/**
	 * Formularz do wstawienia ibrazka RWD (<picture></picture>)
	 */
	public function rwd_image_src(Request $request){
		$data = [];
		return view('themes.'.Config('zmcms.frontend.theme_name').'.backend.zmcms_main_rwd_image_src_frm', compact('data'));
	}
	public function rwd_image_src_process(Request $request){
		$str='<picture>'."\n";
		$d=$request->all();
		if( !((strlen(strip_tags($d['media_query_0']))  ==0 ) || ( strlen(strip_tags($d['img_0'])) ==0 )) ){$str.='<source media="'.$d['media_query_0'].'" srcset="'.$d['img_0'].'" />'."\n";}
		if( !((strlen(strip_tags($d['media_query_1']))  ==0 ) || ( strlen(strip_tags($d['img_1'])) ==0 )) ){$str.='<source media="'.$d['media_query_1'].'" srcset="'.$d['img_1'].'" />'."\n";}
		if( !((strlen(strip_tags($d['media_query_2']))  ==0 ) || ( strlen(strip_tags($d['img_2'])) ==0 )) ){$str.='<source media="'.$d['media_query_2'].'" srcset="'.$d['img_2'].'" />'."\n";}
		if( !((strlen(strip_tags($d['media_query_3']))  ==0 ) || ( strlen(strip_tags($d['img_3'])) ==0 )) ){$str.='<source media="'.$d['media_query_3'].'" srcset="'.$d['img_3'].'" />'."\n";}
		if( !(( strlen(strip_tags($d['default_img'])) ==0 )) ){$str.='<img src="'.$d['default_img'].'"';}
		if( !(( strlen(strip_tags($d['img_title'])) ==0 )) ){$str.=' title="'.$d['img_title'].'"';}
		if( !(( strlen(strip_tags($d['img_alt'])) ==0 )) ){$str.=' alt="'.$d['img_alt'].'"';}
		if( !(( strlen(strip_tags($d['default_img'])) ==0 )) ){$str.=' >'."\n";}
		$str.='</picture>'."\n";
		return $str;
		return '<pre>'.print_r($request->all(), true).'</pre>';
	}

	public function route_path_update($path_old, $path_new){
		$wnav_routes = (Config('database.prefix')??'').'zmcms_routes_table';
		$sql='UPDATE `zmcms_routes_table` SET `path`= REPLACE(`path`, "'.$path_old.'", "'.$path_new.'") WHERE `path` like "%'.$path_old.'%"';
		DB::statement($sql);
		$sql='UPDATE `zmcms_routes_table` SET `path`= REPLACE(`path`, "'.$path_old.'/", "'.$path_new.'/") WHERE `path` like "%'.$path_old.'/%"';
		DB::statement($sql);
	}
}


/**
 * 

Array
(
img_title
img_alt


    [media_query_0] => 
    [img_0] => 
    [media_query_1] => 
    [img_1] => 
    [media_query_2] => 
    [img_2] => 
    [media_query_3] => 
    [img_3] => 
    [default_img_width] => 
    [default_img] => 
)

 */