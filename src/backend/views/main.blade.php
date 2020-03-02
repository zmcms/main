<!DOCTYPE html>
<html lang="pl-PL">
	<head>	
	<title>Zarządzanie treścią</title>
	<meta name="language" content="pl" >
	<meta http-equiv="X-UA-Compatible" content="IE=edge" >
	<meta name="viewport" content="width=device-width, initial-scale=1" >
	<meta name="csrf-token" content="{{ csrf_token() }}" >
	<meta charset="UTF-8" >
	<link rel="stylesheet" type="text/css" href="" >
    <link rel="icon" type="image/png" href="" >
    {!! zmcms_html_css('themes/'.Config('zmcms.main.theme').'/backend/css', $compress = true) !!}
	<script>window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?></script>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	</head>
<body>
@yield('content')
{!! zmcms_html_js('themes/'.Config('zmcms.main.theme').'/backend/js', true) !!}
</body>
</html>