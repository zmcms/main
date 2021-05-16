@extends('themes.'.(Config('zmcms.frontend.theme_name') ?? 'zmcms').'.frontend.main')
@section('content')
	@include('themes.'.(Config('zmcms.frontend.theme_name') ?? 'zmcms').'.frontend.home.parts.main_offer')
	@foreach(zmcms_website_homepage_categories($position = 'start', $order = ['sort' => 'asc']) as $r)
		@includeIf('themes.'.(Config('zmcms.frontend.theme_name') ?? 'zmcms').'.frontend.home.parts.'.$r->type)
	@endforeach
	{{-- <pre>{{
		print_r(zmcms_website_homepage_categories($position = 'start', $order = ['sort' => 'asc']), true)
	}}</pre> --}}

@endsection
