@foreach($resultset as $r)
<a href="{{$r->link}}">
	<div class="offer_icon">
		<img src="{{(json_decode($r->images_resized, true)['ilustration']['300'])}}" alt="{{$r->name}}" >
		<h1>{{$r->name}}</h1>
	</div>
</a>
@endforeach
