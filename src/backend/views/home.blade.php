@extends('themes.'.Config('zmcms.frontend.theme_name').'.backend.main')
@section('content')
<div class="home_modules_list">
@foreach(Config(Config('zmcms.frontend.theme_name').'.backend.bankend_home_panel_views') as $v)
	{!!view()->file($v)!!}
@endforeach
</div>
@endsection
