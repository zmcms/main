<?php
Artisan::command('zmcms_main_load', function () {
	 require(getcwd().'/vendor/zmcms/website_main/src/dummy/example_data.php');
});
