@extends('themes.'.Config('zmcms.frontend.theme_name').'.backend.main')
@section('content')
<h1 class="">Identyfikacja graficzna - logo, favicon, itp</h1>
<h3>Załaduj odpowiednie pliki graficzne</h3>
<form class="micro12" id="zmcms_main_frm_logo" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <fieldset>
        <div class="micro12 mini6">
            <div class="micro12">
        	   <strong>Logo</strong> - Plik graficzny z logo. Zalecane są formaty: *.gif, *.jpg, *.png, *.svg. 
            </div>
            <div class="micro12 mini3">
                <select name="logo_width">
                    @foreach(Config(Config('zmcms.frontend.theme_name').'.media.img.sizes') as $s)
                        <option value="{{$s}}">{{$s}} px</option>
                    @endforeach
                </select>
                <label>Szerokość logo</label>
            </div>
            <div class="micro8 mini7">
            <input id="zmcms_main_choose_logo_txt" type="text" name="logo" placeholder=" ">
            <label>Wybierz logo</label>
            </div>
        	<div class="micro4 mini2">
                <button id="zmcms_main_choose_logo">Wybierz</button>
            </div>
                
            
            
        </div>
        <div class="micro12 mini6">
            <div class="micro12">
               <strong>Favicona</strong> - Plik graficzny favicony. Zalecane są formaty: *.gif, *.jpg, *.png, *.ico.
            </div>
            <div class="micro12 mini3">
                <select name="favicon_width">
                    @foreach(Config(Config('zmcms.frontend.theme_name').'.media.img.sizes') as $s)
                        <option value="{{$s}}">{{$s}} px</option>
                    @endforeach
                </select>
                <label>Szerokość favicony</label>
            </div>
            <div class="micro8 mini7">
                <input  id="zmcms_main_choose_favicon_txt" type="text" name="favicon" placeholder=" ">
                <label>Wybierz ikonę</label>
            </div>
            <div class="micro4 mini2">
                <button id="zmcms_main_choose_favicon">Wybierz</button>
            </div>
        </div>
    </fieldset>
    <button id="btn_save">Zapisz zmiany</button>
    <div class="msg"></div>
</form>
{{-- <pre>{{print_r($data, true)}}</pre> --}}
<script>

</script>
@endsection
