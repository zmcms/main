<!DOCTYPE html>
<html lang="pl-PL">
	<head>	
	<title>Zarządzanie treścią</title>
	<meta name="language" content="pl" >
	<meta http-equiv="X-UA-Compatible" content="IE=edge" >
	<meta name="viewport" content="width=device-width, initial-scale=1" >
	<meta name="csrf-token" content="{{ csrf_token() }}" >
	<meta name="backend-prefix" content="{{ Config('zmcms.main.backend_prefix') }}" >
	<meta charset="UTF-8" >
	<link rel="stylesheet" type="text/css" href="" >
    <link rel="icon" type="image/png" href="" >
    {!! zmcms_html_css('themes/'.Config('zmcms.frontend.theme_name').'/backend/css', $compress = false) !!}
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/138da2cdc4.js" crossorigin="anonymous"></script>
	<script>window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?></script>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	</head>
<body>
	@if(Session::has('backend_user'))
	<header class="micro12">
		<nav>
			<ul>
				<li><a href="/{{Config('zmcms.main.backend_prefix').'/home'}}"><span class="fas fa-home"></span></a></li>
				<li><a href="/{{Config('zmcms.main.backend_prefix').'/logout'}}"><span class="fas fa-sign-out-alt"></span></a></li>
			</ul>
		</nav>
	</header>
	<div class="underheadbelt">&nbsp;</div>
	@endif
	<content class="micro12">
		@yield('content')
	</content>
	
	{!! zmcms_html_js('themes/'.Config('zmcms.frontend.theme_name').'/backend/js', false) !!}
	<script src="/themes/{{Config('zmcms.frontend.theme_name')}}/backend/js/tinymce/tinymce.min.js"></script>
{{-- 	<script src="/themes/{{Config('zmcms.frontend.theme_name')}}/backend/js/codemirror/lib/codemirror.js"></script> --}}
	<script>
      tinymce.init({
        selector: '.richeditor',
        skin: 'oxide',
  		content_css: 'default',
  		language: 'pl',
		external_filemanager_path:"/themes/{{Config('zmcms.frontend.theme_name')}}/backend/js/filemanager/",
		filemanager_title:"Manager plików" ,
		paste_data_images: true,
		relative_urls : true,
		remove_script_host : false,
		external_plugins: {
                filemanager : "/themes/{{Config('zmcms.frontend.theme_name')}}/backend/js/filemanager/plugin.min.js"
        },
        plugins : 'code  link image lists charmap print preview fullscreen hr anchor pagebreak searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking table directionality emoticons paste codesample imagetools template',
        toolbar: 'code image media | fullpage | bold italic underline strikethrough casechange| alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect | cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor | insertdatetime preview | forecolor backcolor | table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | visualchars visualblocks nonbreaking template pagebreak restoredraft',
      });
    </script>
@include('themes.'.Config('zmcms.frontend.theme_name').'.backend.zmcms_main_ajax_dialog_box')
</body>
</html>
