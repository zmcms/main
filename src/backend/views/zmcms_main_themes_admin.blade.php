@extends('themes.zmcms.backend.main')
@section('content')
<h1 class="">Motywy graficzne serwisu</h1>
<form class="micro12" id="zmcms_main_frm_themes" method="post" enctype="multipart/form-data">
	{!! csrf_field() !!}
	<fieldset>
	<legend>Zarządzaj motywami</legend>
	<label class="micro12">
		<span class="micro12 mini4">Utwórz nowy motyw</span>
		<input class="micro12 mini6" type="text" name="headquarters[business_name]" value="" placeholder="Podaj kod motywu">
		<button class="micro12 mini2" class="btn_new_theme_create">Utwórz</button>
	</label>
	</fieldset>
	<fieldset>
		<legend>Zainstalowane motywy:</legend>
		<pre>{{print_r($data, true)}}</pre>
	</fieldset>
	
	
	<div class="msg"></div>
</form>
@endsection
