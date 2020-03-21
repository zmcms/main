 <?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class ZmcmsMain extends Migration{
	public function up(){
		$tblNamePrefix=(Config('database.prefix')??'');
		$tblName=$tblNamePrefix.'zmcms_documents_defaults';
		Schema::create($tblName, function($table){$table->string('name', 50);});  // Nazwa parametru, np. og:title albo title
		Schema::table($tblName, function($table){$table->string('value', 150);}); // Wartość parametru
		Schema::table($tblName, function($table){$table->string('context', 20);});	// {html_head, html_body, database, js, php}
		Schema::table($tblName, function($table){$table->primary(['name', 'context'], 'tkey1');});

		$tblName=$tblNamePrefix.'zmcms_routes_table';
		Schema::create($tblName, function($table){$table->string('path', 150);});  // ścieżka po adresie serwisu www
		Schema::table($tblName, function($table){$table->string('type', 255);});  // Typ nawigacji (patrz config - website_navigations.php)
		Schema::table($tblName, function($table){$table->string('controller', 255);});  // Kontroler przypisany do ścieżki 
		Schema::table($tblName, function($table){$table->string('method', 255);});  // Kontroler przypisany do ścieżki 
		Schema::table($tblName, function($table){$table->string('parameters', 255);});  // ewentualne parametry w formacie json
		Schema::table($tblName, function($table){$table->primary(['path'], 'tkey2');});

		$tblName=$tblNamePrefix.'zmcms_translations';
		Schema::create($tblName, function($table){$table->string('content', 255);});  // Treść do przetłumaczenia
		Schema::table ($tblName, function($table){$table->string('langs_id', 5);}); // pl, en, ru itp. Język, na jki tłumaczymy
		Schema::table ($tblName, function($table){$table->string('translated', 255);});  // Treść przetłumaczona

	}
	public function down(){
	}
}
