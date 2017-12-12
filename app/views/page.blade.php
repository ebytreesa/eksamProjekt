@extends('layouts.home')

@section('title')
{{ $page->slug }}
@stop

@section('content')
	
<div class="container" style="width:90%; min-height: 400px; padding-bottom:30px;">
	<div class="row">
	
		@if ($page->image)
		<div class="col-sm-7" style=" margin-right:30px;  ">
			<h3 class="" style=" font-weight:900; font-style:italic;margin-bottom:40px;">{{ $page->title }}</h3>
			<p>{{ nl2br($page->content) }}</p>	
			@if($page->slug == 'Hjælp')
			<p>Adressen på vores afhentningssted finder du <a href="{{ URL::to('/page/Afhentning') }}">her</a></p>
		@endif
		</div>
		<div class="col-sm-4"  style=" ">
			
				<img src="{{ URL::to('/images/'.$page->image) }}" class="img-responsive  pull-right" style="height:300px; width:330px;margin-top:60px; border:1px solid grey; " >
			
		</div>
		@else
			<div class="col-sm-12">
				<h3 class="" style=" font-weight:900; font-style:italic;margin-bottom:40px;">{{ $page->title }}</h3>
				<p>{{ nl2br($page->content) }}</p>	
			</div>

			@if($page->slug == 'Hjælp')
			<p>Adressen på vores afhentningssted finder du <a href="{{ URL::to('/page/Afhentning') }}">her</a></p>
			@endif	
		@endif

		

	</div>
	
</div>
 

@stop
