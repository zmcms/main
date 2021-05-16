@foreach($resultset as $r)
@if($loop->iteration  == 1)
	<div class="poster">
		<a href="#">
			<img src="{{(json_decode($r->images_resized, true)['ilustration']['600'])}}" alt="{{$r->name}}" >
			<h1>{{$r->name}}</h1>
		</a>
	</div>
@else
	<div class="poster_after">
		<a href="#">
			<div class="item">
				<img src="{{(json_decode($r->images_resized, true)['ilustration']['200'])}}" alt="{{$r->name}}" >
				<h2>{{$r->name}}</h2>
			</div>
		</a>
	</div>
@endif
@endforeach
