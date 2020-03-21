@extends('themes.zmcms.backend.main')
@section('content')
<div class="home_modules_list">
@foreach(Config('zmcms.backend.bankend_home_panel_views') as $v)
	{!!view()->file($v)!!}
@endforeach
</div>
@endsection