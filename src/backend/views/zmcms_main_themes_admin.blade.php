@extends('themes.'.Config('zmcms.frontend.theme_name').'.backend.main')
@section('content')
<h1 class="">Motywy graficzne serwisu</h1>
<form class="micro12" id="zmcms_main_frm_themes" method="post" enctype="multipart/form-data">
	{!! csrf_field() !!}
	<fieldset class="micro12">
	<legend>Zarządzaj motywami</legend>
		<div class="micro12">		
			<input type="text" id="txt_new_theme_create" name="theme_name" placeholder=" ">
			<label>Podaj kod nowego motywu</label>
			<button id="btn_new_theme_create">Utwórz</button>
		</div>
	</fieldset>
	<fieldset>
		<legend>Zainstalowane motywy:</legend>
		<ul>
		@foreach($data as $d)
		<li>{{$d}}</li>	
		@endforeach
		</ul>
	</fieldset>
	<div class="msg"></div>
</form>
@endsection
