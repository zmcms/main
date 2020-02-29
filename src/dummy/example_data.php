<?php
namespace Zmcms\WebsiteNavigations;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades;

$zmcms_documents_defaults = [
	['name'=>'site_title', 'value'=>'ZMCMS', 'context'=>'html_head',],
	['name'=>'site_subtitle', 'value'=>'System zarządzania treścią', 'context'=>'html_head',],
	['name'=>'defaul_frm_send_email', 'value'=>'kontakt@co-it.pl', 'context'=>'form',],
];

$zmcms_routes_table=[
	['path'=>'/', 		'type'=>'homepage', 		'controller'=>'Zmcms\Main\Frontend\Controllers\ZmcmsMainController', 'method'=>'homepage', 'parameters'=>'', ],
	['path'=>'/kotakt', 'type'=>'static_pages', 	'controller'=>'Zmcms\Main\Frontend\Controllers\ZmcmsMainController', 'method'=>'static_pages', 'parameters'=>json_encode(['langs'=>'pl', 'view'=>'kontakt']), ],
];

$tblNamePrefix=(Config('database.prefix')??'');
$tblName=$tblNamePrefix.'zmcms_documents_defaults';
foreach($zmcms_documents_defaults as $a){
	DB::table($tblName)->insert(['name'=>$a['name'], 'value'=>$a['value'], 'context'=>$a['context'],]);
}

$tblName=$tblNamePrefix.'zmcms_routes_table';
foreach($website_navigations_positions_names as $a){
	DB::table($tblName)->insert([ 'path'=>$a['path'],'type'=>$a['type'],'controller'=>$a['controller'],'method'=>$a['method'],'parameters'=>$a['parameters'], ]);
}


