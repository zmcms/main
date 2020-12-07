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
	['path'=>'/',  'parameters'=>'', ],
	['path'=>'/kotakt', 'parameters'=>json_encode(['langs'=>'pl', 'view'=>'kontakt']), ],
];

$tblNamePrefix=(Config('database.prefix')??'');
$tblName=$tblNamePrefix.'zmcms_documents_defaults';
foreach($zmcms_documents_defaults as $a){
	DB::table($tblName)->insert(['name'=>$a['name'], 'value'=>$a['value'], 'context'=>$a['context'],]);
}

$tblName=$tblNamePrefix.'zmcms_routes_table';
foreach($zmcms_routes_table as $a){
	DB::table($tblName)->insert([ 'path'=>$a['path'], 'parameters'=>$a['parameters'], ]);
}


