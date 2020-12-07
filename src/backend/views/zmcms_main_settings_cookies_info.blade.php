@extends('themes.zmcms.backend.main')
@section('content')
<h1 class="">Publiczne dane kontaktowe dostępne w aplikacji</h1>
<form class="micro12" id="zmcms_main_frm_cookies_info" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <fieldset>
    <legend>Informacja o ciasteczkach</legend>
        <label class="micro12 mini12">
            <span class="micro12 mini1 small1">Tytuł</span>
            <input class="micro12 mini11 small11" type="text" name="title" value="{{$data['title'] ?? null}}" placeholder="Tytuł komunikatu"></label>
        <label class="micro12 mini6">
            <span class="micro12 mini2 small3">Czas trwania</span>
            <input class="micro12 mini10 small9" type="text" name="duration" value="{{$data['duration'] ?? null}}" placeholder="Czas trwania"></label>
        <label class="micro12 mini6">
            <span class="micro12 mini2 small3">Link</span>
            <input class="micro12 mini10 small9" type="text" name="link" value="{{$data['link'] ?? null}}" placeholder="Link do miejsca, gdzie jest więcej informaji o ciasteczkach"></label>
        <label class="micro12">Treść komunikatu
            <textarea class="richeditor" name="content" placeholder="Treść komunikatu o ciasteczkach">{{$data['content'] ?? null}}</textarea>
        </label>
    </fieldset>
    <button id="btn_save">Zapisz zmiany</button>
    <div class="msg"></div>
</form>
@endsection
