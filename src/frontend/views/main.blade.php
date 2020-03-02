<!DOCTYPE html>
<html lang="pl-PL">
<?php $head = zmcms_get_initial_head_data($theme = 'zmcms'); ?>
	<head>	
	<title>{{$head['title']}}</title>
	<meta name="keywords" content="{{$head['keywords']}}" >
	<meta name="description" content="{{$head['description']}}" >
	<link rel="canonical" href="{{$head['canonical']}}" >
	<meta property="og:title" content="#{{$head['og:title']}}" >
	<meta property="og:type" content="{{$head['og:type']}}" >
	<meta property="og:url" content="{{$head['og:url']}}" >
	<meta property="og:image" content="{{$head['og:image']}}" >
	<meta property="og:description" content="{{$head['og:description']}}" >
	<meta property="og:locale" content="pl_PL{{$head['og:locale']}}" >
	<meta name="language" content="{{$head['language']}}" >
	<meta http-equiv="X-UA-Compatible" content="IE=edge" >
	<meta name="viewport" content="width=device-width, initial-scale=1" >
	<meta name="csrf-token" content="{{ csrf_token() }}" >
	<meta charset="UTF-8" >
	{!! zmcms_html_css('themes/'.Config('zmcms.main.theme').'/frontend/css', $compress = true) !!}
    <link rel="icon" type="image/png" href="{{$head['icon']}}" >
    <script type="text/javascript" src="{{$head['script'] ?? null }}"></script>
	<script>window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?></script>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	@includeIf('themes.'.Config('frontend.theme_name').'.seo.google_script')
	</head>
<body>
@yield('content')
{!! zmcms_html_js('themes/'.Config('zmcms.main.theme').'/frontend/js', true) !!}
</body>
</html>