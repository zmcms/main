 <?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class ZmcmsMain extends Migration{
	public function up(){
		$tblNamePrefix=(Config('database.prefix')??'');
		$tblName=$tblNamePrefix.'zmcms_documents_defaults';
		Schema::create($tblName, function($table){$table->string('name', 20);});  // Nazwa parametru, np. og:title albo title
		Schema::table($tblName, function($table){$table->string('value', 150);}); // Wartość parametru
		Schema::table($tblName, function($table){$table->string('context', 20);});	// {html_head, html_body, database, js, php}
		Schema::table($tblName, function($table){$table->primary(['name', 'context'], 'tkey1');});
	}
	public function down(){
	}
}
