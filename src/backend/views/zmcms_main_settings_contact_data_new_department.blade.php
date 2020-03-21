@extends('themes.zmcms.backend.main')
@section('content')
<h1 class="">Publiczne dane kontaktowe dostępne w aplikacji - nowa lokalizacja</h1>
<form class="micro12" id="contact_data_create_new_department_frm" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <legend>Dodatkowe dane kontaktowe - nowa lokalizacja</legend>  
    <p>Tę część formularza możesz wypełnić, jeżeli np. Twoja Firma ma działy w różnych lokalizacjach.</p>
    <fieldset>
        <label class="micro12">
            <span class="micro12 mini2">Nazwa lokalizacji</span>
            <input type="hidden" id="department_key_" name="departments[1][key]" value="1">
            <input class="micro12 mini10" id="department_name_" type="text" name="departments[1][localisation_name]" value="" placeholder="Nazwa lokalizacji, np. dział obsługi Klienta">
        </label>
        <label class="micro12 mini6" class="micro12 mini2 medium2">
            <span class="micro12 mini4">Telefon</span>
            <input class="micro12 mini8" type="text" name="departments[1][phone]" value="" placeholder="Główny telefon w tej lokalizacji">
        </label>
        <label class="micro12 mini6" class="micro12 mini2 medium2">
            <span class="micro12 mini4">Adres e-mail</span>
            <input class="micro12 mini8" type="text" name="departments[1][mail]" value="" placeholder="Główny e-mail w tej lokalizacji">
        </label>
        <label class="micro12">
            <span class="micro12">Adres lokalizacji</span>
                <input class="micro12" type="text" name="departments[1][addr_l1]" value="" placeholder="Pierwsza linia adresu">
                <input class="micro12" type="text" name="departments[1][addr_l2]" value="" placeholder="Druga linia adresu">
                <input class="micro12 mini2" type="text" name="departments[1][zip_code]" value="" placeholder="Kod pocztowy">
                <input class="micro12 mini4" type="text" name="departments[1][locality]" value="" placeholder="Miejscowość">
                <input class="micro12 mini3" type="text" name="departments[1][province]" value="" placeholder="Województwo">
                <input class="micro12 mini2" type="text" name="departments[1][country]" value="" placeholder="Kraj">
                <input class="micro12 mini1" type="text" name="departments[1][countryID]" value="" placeholder="Identyfikator kraju">
        </label>
    </fieldset>
    <button id="btn_save">Zapisz zmiany</button>
    <div class="msg"></div>
</form>
@endsection
