@extends('themes.'.Config('zmcms.frontend.theme_name').'.backend.main')
@section('content')
{{-- <div class="underheadbelt"></div> --}}
<h1 class="">Publiczne dane kontaktowe dostępne w aplikacji - nowa lokalizacja</h1>
<form class="micro12" id="contact_data_create_new_department_frm" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <legend>Dodatkowe dane kontaktowe - nowa lokalizacja</legend>  
    <fieldset>
            <div class="micro12">
                <input type="hidden" id="department_key_1" name="departments[1][key]" value="1">
                <input id="department_name_1" type="text" name="departments[1][localisation_name]" value="" placeholder=" ">
                <label>Nazwa lokalizacji</label>
            </div>
            <div class="micro12 mini6">
                <input type="text" name="departments[1][phone]" value="" placeholder=" ">
                <label>Telefon</label>
            </div>
            <div class="micro12 mini6">
                <input type="text" name="departments[1][mail]" value="" placeholder=" ">
                <label>Adres e-mail</label>
            </div>
            <div class="micro12 mini12">
                <input  type="text" name="departments[1][addr_l1]" value="" placeholder="Pierwsza linia adresu">
            </div>
            <div class="micro12 mini12">
                <input  type="text" name="departments[1][addr_l2]" value="" placeholder="Druga linia adresu">
            </div>
            <div class="micro12 mini3">
                <input  type="text" name="departments[1][zip_code]" value="" placeholder=" ">
                <label>Kod pocztowy</label>
            </div>
            <div class="micro12 mini4">
                <input  type="text" name="departments[1][locality]" value="" placeholder=" ">
                <label>Miejscowość</label>
            </div>
            <div class="micro12 mini5">
                <input  type="text" name="departments[1][province]" value="" placeholder=" ">
                <label>Województwo</label>
            </div>
            <div class="micro12 mini8">
                <input  type="text" name="departments[1][country]" value="" placeholder=" ">
                <label>Kraj</label>
            </div>
            <div class="micro12 mini4">
                <input  type="text" name="departments[1][countryID]" value="" placeholder=" ">
                <label>Identyfikator kraju</label>    
            </div>
    </fieldset>
    <button id="btn_save">Zapisz zmiany</button>
    <div class="msg"></div>
</form>
@endsection
