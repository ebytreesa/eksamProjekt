@extends('layouts.dashboard')

@section('title')
{{ $page->title }}
@stop

@section('content')
<div class="container" style="width:90%; ">
<span class="" style=" font-weight:900; font-size:20px;margin-bottom:40px;">{{ $page->slug }}</span>
<a href="{{ URL::to('/admin/editPage/'.$page->id) }}" style="margin-left: 50px;"><span class="glyphicon glyphicon-pencil"></span></a>

{{-- <a  style="margin-left:20px;" href="{{ URL::to('/admin/deletePage/'.$page->id) }}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></td> --}}
<hr style="border-color: grey;">
</div>
<div class="container" style="width:90%; padding-bottom:30px;">
	<div class="row">
	
		@if ($page->image)
		<div class="col-sm-8" style=" border:;  ">
			<h3 class="" style=" font-weight:900; font-style:italic;margin-bottom:40px;">{{ $page->title }}</h3>
			<p>{{ nl2br($page->content) }}</p>	
			@if($page->slug == 'Hjælp')
			<p>Adressen på vores afhentningssted finder du <a href="{{ URL::to('/admin/pages/15') }}">her</a></p>
		@endif
		</div>
		<div class="col-sm-4"  style=" border:;">
			
				<img src="{{ URL::to('/images/'.$page->image) }}" class="image-responsive  pull-right" style="height:300px; width:450px;margin-top:60px; border:1px solid grey; " >
			
		</div>
		@else
			<div class="col-sm-12">
				<h3 class="" style=" font-weight:900; font-style:italic;margin-bottom:40px;">{{ $page->title }}</h3>
				<p>{{ nl2br($page->content) }}</p>	
			</div>

			@if($page->slug == 'Hjælp')
			<p>Adressen på vores afhentningssted finder du <a href="{{ URL::to('/pages/') }}">her</a></p>
		@endif	
		@endif

		

	</div>
	
</div>

{{-- 	</div> --}}
	

 

@stop
