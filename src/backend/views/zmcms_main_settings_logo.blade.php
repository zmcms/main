@extends('themes.zmcms.backend.main')
@section('content')
<h1 class="">Identyfikacja graficzna - logo, favicon, itp</h1>
<form class="micro12" id="zmcms_main_frm_logo" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <fieldset>
    <legend>Załaduj odpowiednie pliki graficzne</legend>
        <label class="micro12 mini6">
        	<strong>Logo</strong> 
        	- Plik graficzny z logo. Zalecane są formaty: *.gif, *.jpg, *.png, *.svg. <input class="mini9" id="zmcms_main_choose_logo_txt" type="text" name="logo" placeholder="Załaduj plik graficzny z logo.">
        	<button class="mini2" id="zmcms_main_choose_logo">Wybierz</button>
            <label class="micro12">
                Szerokość logo
            <select name="logo_width" class="micro3">
                @foreach(Config(Config('zmcms.frontend.theme_name').'.media.img.sizes') as $s)
                    <option value="{{$s}}">{{$s}} px</option>
                @endforeach
            </select>
            </label>
        </label>
        <label class="micro12 mini6">
        	<strong>Favicona</strong> 
        	- Plik graficzny favicony. Zalecane są formaty: *.gif, *.jpg, *.png, *.ico.<input  id="zmcms_main_choose_favicon_txt"class="mini9" type="text" name="favicon" placeholder="Załaduj plik graficzny z faviconą.">
        	<button class="mini2" id="zmcms_main_choose_favicon">Wybierz</button>
            <label class="micro12">
                Szerokość favicony
                <select name="favicon_width" class="micro3">
                    @foreach(Config(Config('zmcms.frontend.theme_name').'.media.img.sizes') as $s)
                        <option value="{{$s}}">{{$s}} px</option>
                    @endforeach
                </select>
            </label>
        </label>
    </fieldset>
    <button id="btn_save">Zapisz zmiany</button>
    <div class="msg"></div>
</form>
{{-- <pre>{{print_r($data, true)}}</pre> --}}
<script>

</script>
@endsection
