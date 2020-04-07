@extends('themes.zmcms.backend.main')
@section('content')
<h1 class="">Publiczne dane kontaktowe dostępne w aplikacji</h1>
<form class="micro12" id="zmcms_main_frm_contact_data" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <fieldset>
    <legend>Podstawowe informacje o włascicielu</legend>
        <label class="micro12">
            <span class="micro12 mini2">Nazwa firmy</span>
            <input class="micro12 mini10" type="text" name="headquarters[business_name]" value="{{$data['headquarters']['business_name'] ?? null}}" placeholder="Nazwa Firmy"></label>
        <label class="micro12 mini6">
            <span class="micro12 mini4">Główny telefon</span>
            <input class="micro12 mini8" type="text" name="headquarters[phone]" value="{{$data['headquarters']['phone'] ?? null}}" placeholder="Główny telefon"></label>
        <label class="micro12 mini6">
            <span class="micro12 mini4">Główny e-mail</span>
            <input class="micro12 mini8" type="text" name="headquarters[mail]" value="{{$data['headquarters']['email'] ?? null}}" placeholder="Główny e-mail"></label>
        <label class="micro12 mini6 small4">
            <span class="micro12 mini4">NIP</span>
            <input class="micro12 mini8" type="text" name="headquarters[vat_id]" value="{{$data['headquarters']['vat_id'] ?? null}}" placeholder="NIP"></label>
        <label class="micro12 mini6 small4">
            <span class="micro12 mini4">REGON</span>
            <input class="micro12 mini8" type="text" name="headquarters[regon]" value="{{$data['headquarters']['regon'] ?? null}}" placeholder="REGON"></label>
        <label class="micro12 mini6 small4">
            <span class="micro12 mini4">KRS</span>
            <input class="micro12 mini8" type="text" name="headquarters[krs]" value="{{$data['headquarters']['krs'] ?? null}}" placeholder="KRS"></label>
        <label class="micro12 mini6 small3">
            <span class="micro12 mini4">Bank</span>
            <input class="micro12 mini8" type="text" name="headquarters[bank_name]" value="{{$data['headquarters']['bank_name'] ?? null}}" placeholder="Nazwa banku"></label>
        <label class="micro12 small9">
            <span class="micro12 small2">Konto</span>
            <input class="micro12 small10" type="text" name="headquarters[bank_account_number]" value="{{$data['headquarters']['bank_account_number'] ?? null}}" placeholder="Nazwa banku"></label>
        <label class="micro12">
            <span class="micro12">Adres</span>
            <input class="micro12" type="text" name="headquarters[addr_l1]" value="{{$data['headquarters']['addr_l1'] ?? null}}" placeholder="Pierwsza linia adresu">
            <input class="micro12" type="text" name="headquarters[addr_l2]" value="{{$data['headquarters']['addr_l2'] ?? null}}" placeholder="Druga linia adresu">
            <input class="micro12 mini2" type="text" name="headquarters[zip_code]" value="{{$data['headquarters']['zip_code'] ?? null}}" placeholder="Kod pocztowy">
            <input class="micro12 mini4" type="text" name="headquarters[locality]" value="{{$data['headquarters']['locality'] ?? null}}" placeholder="Miejscowość">
            <input class="micro12 mini3" type="text" name="headquarters[province]" value="{{$data['headquarters']['province'] ?? null}}" placeholder="Województwo">
            <input class="micro12 mini2" type="text" name="headquarters[country]" value="{{$data['headquarters']['country'] ?? 'Polska'}}" placeholder="Kraj">
            <input class="micro12 mini1" type="text" name="headquarters[countryID]" value="{{$data['headquarters']['countryID'] ?? 'pl'}}" placeholder="Identyfikator kraju">
        </label>
    </fieldset>
    <fieldset>
    <legend>Dodatkowe dane kontaktowe</legend>  
    <p>Tę część formularza możesz wypełnić, jeżeli np. Twoja Firma ma działy w różnych lokalizacjach.</p>
    @if(isset($data['departments']) && is_array($data['departments']) && count($data['departments'])>0)
        @foreach($data['departments'] as $k=>$d)
            <fieldset>
                <label class="micro12" style="background-color: #aaa">
                    <span class="micro12 mini2">Nazwa lokalizacji</span>
                    <input type="hidden" id="department_key_{{$loop->iteration}}" name="departments[1][key]" value="{{$k}}">
                    <input class="micro12 mini8" id="department_name_{{$loop->iteration}}" type="text" name="departments[1][localisation_name]" value="{{$d['localisation_name'] ?? null}}" placeholder="Nazwa lokalizacji, np. dział obsługi Klienta">
                    <span class="micro12 mini2">
                        <a id="department_new_{{$loop->iteration}}" href="#"><span class="fas fa-plus"></span></a>
                        <a id="department_del_{{$loop->iteration}}" href="#"><span class="fas fa-trash-alt"></span></a>
                    </span>
                </label>
                <label class="micro12 mini6" class="micro12 mini2 medium2">
                    <span class="micro12 mini4">Telefon</span>
                    <input class="micro12 mini8" type="text" name="departments[1][phone]" value="{{$d['phone'] ?? null}}" placeholder="Główny telefon w tej lokalizacji">
                </label>
                <label class="micro12 mini6" class="micro12 mini2 medium2">
                    <span class="micro12 mini4">Adres e-mail</span>
                    <input class="micro12 mini8" type="text" name="departments[1][mail]" value="{{$d['headquarters']['email'] ?? null}}" placeholder="Główny e-mail w tej lokalizacji">
                </label>
                <label class="micro12">
                    <span class="micro12">Adres lokalizacji</span>
                        <input class="micro12" type="text" name="departments[1][addr_l1]" value="{{$d['addr_l1'] ?? null}}" placeholder="Pierwsza linia adresu">
                        <input class="micro12" type="text" name="departments[1][addr_l2]" value="{{$d['addr_l2'] ?? null}}" placeholder="Druga linia adresu">
                        <input class="micro12 mini2" type="text" name="departments[1][zip_code]" value="{{$d['zip_code'] ?? null}}" placeholder="Kod pocztowy">
                        <input class="micro12 mini4" type="text" name="departments[1][locality]" value="{{$d['locality'] ?? null}}" placeholder="Miejscowość">
                        <input class="micro12 mini3" type="text" name="departments[1][province]" value="{{$d['province'] ?? null}}" placeholder="Województwo">
                        <input class="micro12 mini2" type="text" name="departments[1][country]" value="{{$d['country'] ?? 'Polska'}}" placeholder="Kraj">
                        <input class="micro12 mini1" type="text" name="departments[1][countryID]" value="{{$d['countryID'] ?? 'pl'}}" placeholder="Identyfikator kraju">
                </label>
            </fieldset>
        @endforeach
    @else
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
    @endif
    {{-- <pre>{{print_r($data, true)}}</pre> --}}
    </fieldset>
    <button id="btn_save">Zapisz zmiany</button>
    <div class="msg"></div>
</form>
@endsection
