<?php
Artisan::command('zmcms_main_load', function () {
	 require(getcwd().'/vendor/zmcms/main/src/dummy/example_data.php');
});
