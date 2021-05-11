@extends('themes.'.Config('zmcms.frontend.theme_name').'.backend.main')
@section('content')
<div class="home_modules_list">
@foreach(Config(Config('zmcms.frontend.theme_name').'.backend.bankend_home_panel_views') as $v)
	{!!view()->file($v)!!}
@endforeach
</div>
<div class="micro12">
	<pre>
		{{print_r($af_api, true)}}
	</pre>
</div>
@endsection