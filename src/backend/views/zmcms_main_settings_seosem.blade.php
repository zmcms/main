@extends('themes.'.Config('zmcms.frontend.theme_name').'.backend.main')
@section('content')
<h1 class="">Dla pozycjonerów: Ustawienia domyślne SEO / SEM</h1>
<form class="micro12" id="zmcms_main_seo_sem" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <fieldset style="text-align: left">
    <legend>Nagłówek HEAD dokumentu HTML</legend>
    	<div class="micro12">
            <label>Tytuł na przeglądarce</label>
            <input type="text" name="head[title]" value="{{$data['head']['title']}}" placeholder=" ">	
    	</div>
        <div class="micro12">
            <input type="text" name="head[keywords]" value="{{$data['head']['keywords']}}" placeholder=" ">	
            <label>Słowa kluczowe</label>
        </div>
        <div class="micro12">
            <input type="text" name="head[description]" value="{{$data['head']['description']}}" placeholder=" ">
            <label>Opis dokumentu</label>
        </div>
        <div class="micro12 mini3">
            <input type="text" name="head[language]" value="{{$data['head']['language']}}" placeholder=" ">	
            <label>Język</label>
        </div>
        <div class="micro12 mini3">
            <input type="text" name="head[author]" value="{{$data['head']['author']}}" placeholder=" ">
            <label>Autor</label>
        </div>
        <div class="micro12 mini3">
            <input type="text" name="head[refresh]" value="{{$data['head']['refresh']}}" placeholder=" ">	
            <label>Odświeżanie</label>
        </div>
        <div class="micro12 mini3">
            <input type="text" name="head[robots]" value="{{$data['head']['robots']}}" placeholder=" ">	
            <label>Dyrektywy dla robotów</label>
        </div>
        <div class="micro12">
            <input type="text" name="head[google-site-verification]" value="{{$data['head']['google-site-verification']}}" placeholder=" ">	
            <label>Token weryfikacyjny Google</label>
        </div>
    </fieldset>
    <fieldset style="text-align: left">
    	<legend>Open Graph</legend>
    	<p>Niektóre aplikacje używają Open Graph np. do przedstawiania "podglądu" strony / aplikacji, gdy np. wysyłasz mail, publikujesz na Facebooku itp.</p>
    	<p>Więcej informacji pod tym linkiem: <a href="https://ogp.me" target="_blank" style="display: inline;">https://ogp.me</a></p>
        <div class="micro12">
            <input type="text" name="og[title]" value="{{$data['og']['title']}}"placeholder=" ">
            <label>Tytuł</label>
        </div>
        <div class="micro12">
            <input type="text" name="og[description]" value="{{$data['og']['description']}}" placeholder=" ">
            <label>Opis</label>
        </div>        
        <div class="micro12">
            <input type="text" name="og[url]" value="{{$data['og']['url']}}" placeholder=" ">
            <label>Link</label>
        </div>    	
        <div class="micro12">
            <input type="text" name="og[type]" value="{{$data['og']['type']}}" placeholder=" ">
            <label>Rodzaj</label>
        </div>    	
        <div class="micro12">
            <div class="micro8 mini10">
            <input type="text" id="og_image_choose_txt" name="og[image]" value="" placeholder=" ">
            <label>Ilustracja</label>
            </div>
            <div class="micro4 mini2">
                <button id="zmcms_main_choose_og_image">Wybierz</button>
            </div>
        </div>
        <div class="micro12">
            <input type="text" name="og[image:width]" value="{{$data['og']['image']['width']}}" placeholder=" ">
            <label>Szerokość</label>
        </div>
        <div class="micro12">        
            <input type="text" name="og[image:height]" value="{{$data['og']['image']['height']}}" placeholder=" ">
            <label>Wysokość</label>
        </div>
        <div class="micro12">        
            <input type="text" name="og[image:format]" value="{{$data['og']['image']['format']}}" placeholder=" ">
            <label>Format</label>
        </div>
        <div class="micro12">        
            <input type="text" name="og[image:alt]" value="{{$data['og']['image']['alt']}}" placeholder=" ">
            <label>Opis ALT</label>
        </div>
	</fieldset>
    <button id="btn_save">Zapisz zmiany</button>
    <div class="msg"></div>
</form>
{{-- 
og:title - The title of your object as it should appear within the graph, e.g., "The Rock".
og: - The type of your object, e.g., "video.movie". Depending on the type you specify, other properties may also be required.
og: - An image URL which should represent your object within the graph.
og:url - The canonical URL of your object that will be used as its permanent ID in the graph, e.g.,


<meta property="og:image" content="http://example.com/ogp.jpg" />
<meta property="og:image:secure_url" content="https://secure.example.com/ogp.jpg" />
<meta property="og:image:type" content="image/jpeg" />
<meta property="og:image:width" content="400" />
<meta property="og:image:height" content="300" />
<meta property="og:image:alt" content="A shiny red apple with a bite taken out" />

 --}}
@endsection
