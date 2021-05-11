@extends('themes.'.Config('zmcms.frontend.theme_name').'.backend.main')
@section('content')
<h1 class="">Ustawienia komunikatu o ciasteczkach</h1>
<form class="micro12" id="zmcms_main_frm_cookies_info" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <fieldset class="micro12">
    <legend>Informacja o ciasteczkach</legend>
        <div class="micro12">
            <input type="text" name="title" value="{{$data['title'] ?? null}}" placeholder=" ">
            <label>Tytuł</label>
        </div>
        <div class="micro12">
            <input type="text" name="duration" value="{{$data['duration'] ?? null}}" placeholder=" ">
            <label>Czas trwania</label>
        </div>
        <div class="micro12">
            <input type="text" name="link" value="{{$data['link'] ?? null}}" placeholder=" ">
            <label>Link</label>
        </div>
        <div class="micro12">
            <h3>Treść komunikatu</label>
            <textarea class="richeditor" name="content" placeholder="Treść komunikatu o ciasteczkach">{{$data['content'] ?? null}}</textarea>
        </div>
    </fieldset>
    <button id="btn_save">Zapisz zmiany</button>
    <div class="msg"></div>
</form>
@endsection
