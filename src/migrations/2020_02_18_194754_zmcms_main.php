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
		Schema::create($tblName, function($table){$table->string('path', 180);});  // ścieżka po adresie serwisu www
		Schema::table($tblName, function($table){$table->string('parameters', 400);});  // ewentualne parametry w formacie json
		Schema::table($tblName, function($table){$table->primary(['path'], 'tkey2');});

		$tblName=$tblNamePrefix.'zmcms_translations';
		Schema::create($tblName, function($table){$table->string('content', 255);});  // Treść do przetłumaczenia
		Schema::table ($tblName, function($table){$table->string('langs_id', 5);}); // pl, en, ru itp. Język, na jaki tłumaczymy
		Schema::table($tblName, function($table){$table->string('translated', 255);});  // Treść przetłumaczona

		$tblName=$tblNamePrefix.'zmcms_correspondence_register';
		Schema::create($tblName, function($table){$table->string('token', 75);});  // Treść do przetłumaczenia
		Schema::table ($tblName, function($table){$table->string('langs_id', 5);}); // pl, en, ru itp. Język, na jaki tłumaczymy
		Schema::table ($tblName, function($table){$table->string('frm_id', 50);}); // Identyfikator formularza, jeżeli wiadomość przyszłe ze strony
		Schema::table ($tblName, function($table){$table->text('content');}); // pl, en, ru itp. Język, na jki tłumaczymy

	}
	public function down(){
	}
}