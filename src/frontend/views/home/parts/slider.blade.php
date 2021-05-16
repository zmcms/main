{{-- <div class="slider fadein">
	<div>
		<picture> 
			<source srcset="/themes/autofutura/media/autofutura/slide1.jpg" media="(max-width: 600px)"> 
			<source srcset="/themes/autofutura/media/autofutura/slide2.jpg" media="(max-width: 1880px)"> 
			<img src="/themes/autofutura/media/autofutura/slide3.jpg" alt="Slide 1"> 
		</picture>
		<div class="intro">
			<div class="content">
				<h2>Nagłówek reklamy</h2>
				<p>To jest jakaś treść nr jeden tej reklamy</p>
			</div>
			<div class="action">
				<a href="#">Więcej</a>
			</div>
		</div>
	</div>
	<div>
		<picture> 
			<source srcset="/themes/autofutura/media/autofutura/slide2.jpg" media="(min-width: 1px)"> 
			<source srcset="/themes/autofutura/media/autofutura/slide2.jpg" media="(min-width: 1181px)"> 
			<img src="/images/pages/baner-procesu.jpg" alt="Slide 2"> 
		</picture>
		<div class="intro">
			<div class="content">
				<h2>Nagłówek kolejnej reklamy</h2>
				<p>To jest jakaś treść tej reklamy. </p>
				<p>Ma ona np. dwa wiersze.</p>
			</div>
			<div class="action">
				<a href="#">Zobacz</a>
			</div>
		</div>
	</div>
	<div>
		<picture> 
			<source srcset="/themes/autofutura/media/autofutura/slide2.jpg" media="(min-width: 1px)"> 
			<source srcset="/themes/autofutura/media/autofutura/slide2.jpg" media="(min-width: 1181px)"> 
			<img src="/images/pages/baner-procesu.jpg" alt="Slide 2"> 
		</picture>
		<div class="intro">
			<div class="content">
				<h2>Nagłówek trzeciej reklamy</h2>
				<p>To jest jakaś treść tej reklamy. </p>
				<p>Ma ona np. dwa wiersze.</p>
			</div>
			<div class="action">
				<a href="#">>></a>
			</div>
		</div>
	</div>
</div> --}}
@php
	use Zmcms\WebsiteNavigations\Frontend\Controllers\ZmcmsWebsiteNavigationsController as C;
	use \Zmcms\WebsiteNavigations\Frontend\Model\WebsiteNavigationJoined as ZMCMSDB;
	$C = new C();
	$slides = $C->navigations_tree(ZMCMSDB::get_records('slider', $active_only = true,  $sort = [['sort', 'asc']]), $parent = null, $selected_token = null);

@endphp
<div class="slider fadein">
	@foreach($slides as $slide)
		<div>
			<a href="{{$slide['link']}}">
			{!! $slide['content'] !!}
			</a>
		</div>
	@endforeach
</div>
{{-- <pre>{{print_r($slides, true)}}</pre> --}}
{{-- <ul class="slider fadein" id="ps_slider">{{zmcms_website_navigations_frontend($position = 'slider', $parent = null, $to_file=false)}}</ul> --}}