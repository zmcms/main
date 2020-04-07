@extends('themes.zmcms.backend.main')
@section('content')
<h1 class="">Dla pozycjonerów: Ustawienia domyślne SEO / SEM</h1>
<form class="micro12" id="zmcms_main_seo_sem" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <fieldset style="text-align: left">
    <legend>Nagłówek HEAD dokumentu HTML</legend>
    	<label class="micro12"><span class="micro12 mini3 small2" >Tytuł na przeglądarce</span>
    		<input class="micro12 mini9 small10" type="text" name="head[title]" value="{{$data['head']['title']}}" placeholder="Wpisz tytuł strony">	
    	</label>
    	<label class="micro12"><span class="micro12 mini3 small2" >Słowa kluczowe</span>
    		<input class="micro12 mini9 small10" type="text" name="head[keywords]" value="{{$data['head']['keywords']}}" placeholder="Wpisz tytuł strony">	
    	</label>
    	<label class="micro12"><span class="micro12 mini3 small2" >Opis dokumentu</span>
    		<input class="micro12 mini9 small10" type="text" name="head[description]" value="{{$data['head']['description']}}" placeholder="Wpisz tytuł strony">	
    	</label>
    	<label class="micro12 mini6 small3"><span class="micro12 mini12 small5" >Język:</span>
    		<input class="micro12 mini12 small7" type="text" name="head[language]" value="{{$data['head']['language']}}" placeholder="np. pl">	
    	</label>
    	<label class="micro12 mini6 small3"><span class="micro12 mini12 small5" >Autor:</span>
    		<input class="micro12 mini12 small7" type="text" name="head[author]" value="{{$data['head']['author']}}" placeholder="np. Jan Kowalski">	
    	</label>
    	<label class="micro12 mini6 small3"><span class="micro12 mini12 small5" >Odświeżanie:</span>
    		<input class="micro12 mini12 small7" type="text" name="head[refresh]" value="{{$data['head']['refresh']}}" placeholder="Podaj liczbę całkowitą (sekundy).">	
    	</label>
    	<label class="micro12 mini6 small3"><span class="micro12 mini12 small5" >Roboty:</span>
    		<input class="micro12 mini12 small7" type="text" name="head[robots]" value="{{$data['head']['robots']}}" placeholder="Dyrektywy dla rootów">	
    	</label>
    	<label class="micro12"><span class="micro12 mini3 small2" >Token weryfikacyjny Google</span>
    		<input class="micro12 mini9 small10" type="text" name="head[google-site-verification]" value="{{$data['head']['google-site-verification']}}" placeholder="parametr google-site-verification">	
    	</label>
    </fieldset>
    <fieldset style="text-align: left">
    	<legend>Open Graph</legend>
    	<p>Niektóre aplikacje używają Open Graph np. do przedstawiania "podglądu" strony / aplikacji, gdy np. wysyłasz mail, publikujesz na Facebooku itp.</p>
    	<p>Więcej informacji pod tym linkiem: <a href="https://ogp.me" target="_blank" style="display: inline;">https://ogp.me</a></p>
    	<label class="micro12"><span class="micro12 mini3 small1" >Tytuł</span>
            <input class="micro12 mini9 small11" type="text" name="og[title]" value="{{$data['og']['title']}}"placeholder="Wyświetlany tytuł">  
        </label>
        <label class="micro12"><span class="micro12 mini3 small1" >Opis</span>
            <input class="micro12 mini9 small11" type="text" name="og[description]" value="{{$data['og']['description']}}" placeholder="Krótki opis">  
        </label>
        <label class="micro12 mini4"><span class="micro12 mini12 small2" >Link</span>
            <input class="micro12 mini12 small10" type="text" name="og[url]" value="{{$data['og']['url']}}" placeholder="parametr google-site-verification">    
        </label>
    	<label class="micro12 mini4"><span class="micro12 mini12 small2" >Rodzaj</span>
    		<input class="micro12 mini12 small10" type="text" name="og[type]" value="{{$data['og']['type']}}" placeholder="np. website">	
    	</label>
    	<label class="micro12 mini4"><span class="micro12 mini12 small2" >Ilustracja</span>
    		<input class="micro9 mini7 small7" type="text" id="og_image_choose_txt" name="og[image]" value="" placeholder="Wybierz ilustrację">	
    		<button class="micro2 mini2 small2" id="zmcms_main_choose_og_image">Wybierz</button>
    	</label>
        <label class="micro12 mini4"><span class="micro12 mini12 small2" >Szerokość</span>
            <input class="micro12 mini12 small10" type="text" name="og[image:width]" value="{{$data['og']['image']['width']}}" placeholder="np. website"> 
        </label>
        <label class="micro12 mini4"><span class="micro12 mini12 small2" >Wysokość</span>
            <input class="micro12 mini12 small10" type="text" name="og[image:height]" value="{{$data['og']['image']['height']}}" placeholder="np. website"> 
        </label>
        <label class="micro12 mini4"><span class="micro12 mini12 small2" >Format</span>
            <input class="micro12 mini12 small10" type="text" name="og[image:format]" value="{{$data['og']['image']['format']}}" placeholder="np. image/jpeg"> 
        </label>
        <label class="micro12"><span class="micro12 mini3 small1" >Opis ALT</span>
            <input class="micro12 mini9 small11" type="text" name="og[image:alt]" value="{{$data['og']['image']['alt']}}" placeholder="Krótki słowny opis obrazka"> 
        </label>
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
