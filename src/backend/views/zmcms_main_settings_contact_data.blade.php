@extends('themes.'.Config('zmcms.frontend.theme_name').'.backend.main')
@section('content')
<h1 class="">Publiczne dane kontaktowe dostępne w aplikacji</h1>
<form class="micro12" id="zmcms_main_frm_contact_data" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <fieldset>
    <legend>Podstawowe informacje o włascicielu</legend>
    <div class="micro12 mini6">
        <input id="zmfcd_name" type="text" name="headquarters[business_name]" value="{{$data['headquarters']['business_name'] ?? null}}" placeholder=" ">
        <label for="zmfcd_name" class="micro12">Nazwa firmy</label>
    </div>
    <div class="micro12 mini3">
        <input id="zmfcd_name" type="text" name="headquarters[phone]" value="{{$data['headquarters']['phone'] ?? null}}" placeholder=" ">
        <label for="zmfcd_name">Główny telefon</label>
    </div>
    <div class="micro12 mini3">
        <input  type="text" name="headquarters[mail]" value="{{$data['headquarters']['email'] ?? null}}" placeholder=" ">
        <label>Główny e-mail</label>
    </div>
    <div class="micro12 mini3">
        <input  type="text" name="headquarters[vat_id]" value="{{$data['headquarters']['vat_id'] ?? null}}" placeholder=" ">
        <label>NIP</label>
    </div>
    <div class="micro12 mini3">
        <input  type="text" name="headquarters[regon]" value="{{$data['headquarters']['regon'] ?? null}}" placeholder=" ">
        <label>REGON</label>
    </div>
    <div class="micro12 mini3">        
        <input type="text" name="headquarters[krs]" value="{{$data['headquarters']['krs'] ?? null}}" placeholder=" ">
        <label>KRS</label>
    </div>
    <div class="micro12 mini3">
        <input  type="text" name="headquarters[bank_name]" value="{{$data['headquarters']['bank_name'] ?? null}}" placeholder="Nazwa banku">
        <label>Bank</label>
    </div>
    <div class="micro12">
        <input  type="text" name="headquarters[bank_account_number]" value="{{$data['headquarters']['bank_account_number'] ?? null}}" placeholder=" ">
        <label>Konto</label>
    </div>
    <h3>Adres</h3>
    <div class="micro12">
        <input  type="text" name="headquarters[addr_l1]" value="{{$data['headquarters']['addr_l1'] ?? null}}" placeholder=" ">
        <label>Pierwsza linia adresu</label>
    </div>
    <div class="micro12">
        <input  type="text" name="headquarters[addr_l2]" value="{{$data['headquarters']['addr_l2'] ?? null}}" placeholder=" ">
        <label>Druga linia adresu</label>
    </div>
    <div class="micro12 mini3">
        <input  type="text" name="headquarters[zip_code]" value="{{$data['headquarters']['zip_code'] ?? null}}" placeholder=" ">
        <label>Kod pocztowy</label>
    </div>
    <div class="micro12 mini4">
        <input  type="text" name="headquarters[locality]" value="{{$data['headquarters']['locality'] ?? null}}" placeholder=" ">
        <label>Miejscowość</label>
    </div>
    <div class="micro12 mini5">
        <input  type="text" name="headquarters[province]" value="{{$data['headquarters']['province'] ?? null}}" placeholder=" ">
        <label>Województwo</label>
    </div>
    <div class="micro12 mini8">
        <input  type="text" name="headquarters[country]" value="{{$data['headquarters']['country'] ?? 'Polska'}}" placeholder=" ">
        <label>Kraj</label>
    </div>
    <div class="micro12 mini4">
        <input  type="text" name="headquarters[countryID]" value="{{$data['headquarters']['countryID'] ?? 'pl'}}" placeholder=" ">
        <label>Identyfikator kraju</label>    
    </div>
    

    </fieldset>
    <fieldset>
        <div class="micro9 mini11">
    <h3>Dodatkowe dane kontaktowe</h3>  
    {{-- <p>Tę część formularza możesz wypełnić, jeżeli np. Twoja Firma ma działy w różnych lokalizacjach.</p> --}}
    </div>
    <div class="micro3 mini1">
        <button id="department_new_1" href="#"><span class="fas fa-plus"></span></button>
    </div>
    @if(isset($data['departments']) && is_array($data['departments']) && count($data['departments'])>0)
        @foreach($data['departments'] as $k=>$d)
            <fieldset id="additional_address_{{$loop->iteration}}" class="micro12">
                <div class="micro9 mini11">
                    <input type="hidden" id="department_key_{{$loop->iteration}}" name="departments[{{$loop->iteration}}][key]" value="{{$k}}">
                    <input id="department_name_{{$loop->iteration}}" type="text" name="departments[{{$loop->iteration}}][localisation_name]" value="{{$d['localisation_name'] ?? null}}" placeholder=" ">
                    <label>Nazwa lokalizacji</label>
                </div>
                <div class="micro3 mini1">
                    <button id="department_del_{{$loop->iteration}}" href="#"><span class="fas fa-trash-alt"></span></button>
                </div>
                <div class="micro12 mini6">
                    <input type="text" name="departments[{{$loop->iteration}}][phone]" value="{{$d['phone'] ?? null}}" placeholder=" ">
                    <label>Telefon</label>
                </div>
                <div class="micro12 mini6">
                    <input type="text" name="departments[{{$loop->iteration}}][mail]" value="{{$d['headquarters']['email'] ?? null}}" placeholder=" ">
                    <label>Adres e-mail</label>
                </div>
                <div class="micro12 mini12">
                    <input  type="text" name="departments[{{$loop->iteration}}][addr_l1]" value="{{$d['addr_l1'] ?? null}}" placeholder="Pierwsza linia adresu">
                </div>
                <div class="micro12 mini12">
                    <input  type="text" name="departments[{{$loop->iteration}}][addr_l2]" value="{{$d['addr_l2'] ?? null}}" placeholder="Druga linia adresu">
                </div>
                <div class="micro12 mini3">
                    <input  type="text" name="departments[{{$loop->iteration}}][zip_code]" value="{{$d['zip_code'] ?? null}}" placeholder=" ">
                    <label>Kod pocztowy</label>
                </div>
                <div class="micro12 mini4">
                    <input  type="text" name="departments[{{$loop->iteration}}][locality]" value="{{$d['locality'] ?? null}}" placeholder=" ">
                    <label>Miejscowość</label>
                </div>
                <div class="micro12 mini5">
                    <input  type="text" name="departments[{{$loop->iteration}}][province]" value="{{$d['province'] ?? null}}" placeholder=" ">
                    <label>Województwo</label>
                </div>
                <div class="micro12 mini8">
                    <input  type="text" name="departments[{{$loop->iteration}}][country]" value="{{$d['country'] ?? 'Polska'}}" placeholder=" ">
                    <label>Kraj</label>
                </div>
                <div class="micro12 mini4">
                    <input  type="text" name="departments[{{$loop->iteration}}][countryID]" value="{{$d['countryID'] ?? 'pl'}}" placeholder=" ">
                    <label>Identyfikator kraju</label>    
                </div>
            </fieldset>
        @endforeach
    @else
        <fieldset id="additional_address_1" class="micro12">
            <div class="micro11 mini11">
                <input type="hidden" id="department_key_1" name="departments[1][key]" value="1">
                <input id="department_name_1" type="text" name="departments[1][localisation_name]" value="" placeholder=" ">
                <label>Nazwa lokalizacji</label>
            </div>
            <div class="micro1 mini1">
                <button id="department_del_1" href="#"><span class="fas fa-trash-alt"></span></button>
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
    @endif
    {{-- <pre>{{print_r($data, true)}}</pre> --}}
    </fieldset>
    <button id="btn_save">Zapisz zmiany</button>
    <div class="msg"></div>
</form>
@endsection
