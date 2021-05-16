@extends('themes.'.(Config('zmcms.frontend.theme_name') ?? 'zmcms').'.frontend.main')
@section('content')
	@include('themes.'.(Config('zmcms.frontend.theme_name') ?? 'zmcms').'.frontend.home.parts.main_offer')
@endsection
