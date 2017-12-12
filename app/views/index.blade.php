@extends('layouts.home')

@section('title')
Home
@stop

@section('content')


<div class="container" style="width:95%; padding-bottom:30px; ">
	<div id="slider" class="carousel slide" data-ride ="carousel">
		<div class="carousel-inner" role="listbox">

			<?php
				$slides = Slide::get();
			?>
			@foreach ($slides as $key => $slide)
		    <div class="item {{ $key == 0 ? ' active' : '' }}">
		      <img src="{{ URL::to('/slides/'.$slide->image) }}" class="image-responsive" style="height:300px;width:100%;">
		    </div>
		    @endforeach
  	
        </div>                
  	</div>
  </div>
@stop

@section('box')
  	{{-- <div class="row" style="height:200px;  "> --}}
  	<div class="container" style="width:100%; padding-top:20px; background-color:  #DCDCDC; ">
  	<div class="row">
  		<?php
  			$boxes = Box::get();
  		?>
  		 @foreach($boxes as $box)
  		 @if(empty($box->link))
  		 	<div class="col-sm-3" style="width:23%; border:1px  grey;margin-right:23px; background-color:grey; padding-bottom: 15px;min-height: 170px; border-radius: 8px; display: inline-block; ">
               <h1 style="text-align:center; color:white; font-weight:700;"> {{ $box->title }}</h1>
               <p style="text-align:center; font-size:18px;">{{ nl2br($box->content) }}</p>
               
            </div>
               
            
        @else
        	<a href="{{ URL::to($box->link) }}" class="" style="text-decoration:none; color:black;" >
            <div class="col-sm-3" style="width:23%; border:1px  grey;margin-right:23px; background-color:grey; padding-bottom: 15px;min-height: 170px; border-radius: 8px;">
               <h1 style="text-align:center; color:white; font-weight:700;"> {{ $box->title }}</h1>
               <p style="text-align:center;font-size:18px;">{{ nl2br($box->content) }}</p>
               
             </a>
        	
             </div>
        @endif
        @endforeach   
  		</div>
  	{{-- </div> --}}
</div>


<script>
  $(document).ready(function(){
    $('.carousal').carousel({
      interval: 2000
    })
  });    
</script>

@stop

