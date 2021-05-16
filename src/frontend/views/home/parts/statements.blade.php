@foreach($resultset as $r)
	<div class="statement">
		{!! $r->content !!}
	</div>
@endforeach
